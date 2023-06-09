define(function(require) {
    'use strict';

    const _ = require('underscore');
    const SubjectFieldView = require('../views/log-call/subject-field-view');
    const NotesFieldView = require('../views/log-call/notes-field-view');
    const PhoneFieldView = require('../views/log-call/phone-field-view');
    const DurationFieldView = require('../views/log-call/duration-field-view');
    const CallDatetimeFieldView = require('../views/log-call/call-datetime-field-view');
    const StartButtonView = require('../views/start-button-view');
    const HangoutsEventBroker = require('orohangoutscall/js/hangouts-event-broker');
    const appPageTemplate = require('tpl-loader!orohangoutscall/templates/hangouts-app-log-call-form.html');
    const BaseComponent = require('oroui/js/app/components/base/component');

    const LogCallStartHangoutComponent = BaseComponent.extend({
        /** @type {HangoutsEventBroker} */
        eventBroker: null,

        /**
         * @inheritdoc
         */
        constructor: function LogCallStartHangoutComponent(options) {
            LogCallStartHangoutComponent.__super__.constructor.call(this, options);
        },

        /**
         * @inheritdoc
         */
        initialize: function(options) {
            LogCallStartHangoutComponent.__super__.initialize.call(this, options);
            this.hangoutOptions = _.clone(options.hangoutOptions || {});
            this.setEventBroker(new HangoutsEventBroker());
            this.initViews(options);
        },

        /**
         * Sets eventBroker
         * - first disposes old eventBroker if exists
         * - then bind event handlers
         *
         * @param {HangoutsEventBroker} eventBroker
         */
        setEventBroker: function(eventBroker) {
            if (this.eventBroker) {
                this.stopListening(this.eventBroker);
                this.eventBroker.dispose();
            }

            this.eventBroker = eventBroker;
            this.listenTo(this.eventBroker, {
                'application-start': this.onApplicationStart,
                'call-started': this.onCallStart,
                'call-is-going': this.onCallIsGoing,
                'call-ended': this.onCallEnd,
                'form-data-change': this.onFormDataChange
            });
        },

        /**
         * Sets external eventBroker
         * (in case a hangout is already started and a log-call dialog was opened as consequence of some action)
         *
         * @param {HangoutsEventBroker} eventBroker
         */
        setExternalEventBroker: function(eventBroker) {
            this.setEventBroker(eventBroker);

            // replay all missed events for the instance
            this.eventBroker.repeatTriggerFor(this);
            // hide own start a hangout button
            this.startButtonView.disable();
        },

        /**
         * Initializes views
         */
        initViews: function(options) {
            // create start button view
            this.startButtonView = new StartButtonView({
                autoRender: true,
                el: options._sourceElement,
                hangoutOptions: options.hangoutOptions || {},
                token: this.eventBroker.getToken()
            });

            const $root = options._sourceElement.closest('form, .ui-dialog');

            // wraps subject field with related view
            const $subjectField = $root.find('[name$="[subject]"]');
            if ($subjectField.length) {
                this.subjectFieldView = new SubjectFieldView({
                    el: $subjectField[0]
                });
            }

            // wraps notes field with related view
            const $notesField = $root.find('[name$="[notes]"]');
            if ($notesField.length) {
                this.notesFieldView = new NotesFieldView({
                    el: $notesField[0]
                });
            }

            // wraps phone field with related view
            const $phoneField = $root.find('[name$="[phoneNumber]"]');
            if ($phoneField.length) {
                this.phoneFieldView = new PhoneFieldView({
                    el: $phoneField[0]
                });
                this.listenTo(this.phoneFieldView, 'change', this.updateStartButton);
            }

            // wraps duration field with related view
            const $durationField = $root.find('[name$="[duration]"]');
            if ($durationField.length) {
                this.durationFieldView = new DurationFieldView({
                    el: $durationField[0]
                });
            }

            // wraps callDateTime field with related view
            const $callDatetimeField = $root.find('[name$="[callDateTime]"]');
            if ($callDatetimeField.length) {
                this.callDatetimeFieldView = new CallDatetimeFieldView({
                    el: $callDatetimeField[0]
                });
            }
        },

        /**
         * Handles phone change event and updates "Start a Hangout" button
         *
         * @param {string} phone
         */
        updateStartButton: function(phone) {
            if (phone) {
                this.hangoutOptions.invites = [{
                    id: phone,
                    invite_type: phone.match(/^.+@.+\..+$/) ? 'EMAIL' : 'PHONE'
                }];
            } else {
                delete this.hangoutOptions.invites;
            }
            this.startButtonView.setHangoutOptions(this.hangoutOptions);
            this.startButtonView.render();
        },

        onApplicationStart: function() {
            this.eventBroker.dispatchToApp('set:appPageHTML', appPageTemplate({}));
        },

        /**
         * Handles 'call-started' event
         *  - update phone number field (if number is passed)
         *  - update call datetime field
         *
         * @param {Object} data
         */
        onCallStart: function(data) {
            if (this.phoneFieldView && data.number) {
                const notNumber = /[^\d]/g;
                // clear format for both numbers (current and new)
                const oldNumber = this.phoneFieldView.getValue().replace(notNumber, '');
                const newNumber = data.number.replace(notNumber, '');
                // compare ending parts of numbers (without country part, it might not exist in new number)
                if (oldNumber.slice(-newNumber.length) !== newNumber) {
                    this.phoneFieldView.setValue(data.number);
                }
            }

            if (this.callDatetimeFieldView) {
                this.callDatetimeFieldView.setValue(data.startedAt);
            }
        },

        /**
         * Handles 'call-is-going' event
         *  - update duration field
         *
         * @param {Object} data
         */
        onCallIsGoing: function(data) {
            if (this.durationFieldView) {
                this.durationFieldView.setValue(Math.floor(data.duration / 1000));
            }
        },

        /**
         * Handles 'call-ended' event
         *  - update duration field
         *
         * @param {Object} data
         */
        onCallEnd: function(data) {
            if (this.durationFieldView) {
                this.durationFieldView.setValue(Math.round(data.duration / 1000));
            }
        },

        /**
         * Handles form data changes in hangout app
         *
         * @param {Object} data
         */
        onFormDataChange: function(data) {
            if (this.subjectFieldView && data.subject !== void 0) {
                this.subjectFieldView.setValue(data.subject);
            }

            if (this.notesFieldView && data.notes !== void 0) {
                this.notesFieldView.setValue(data.notes);
            }
        }
    });

    return LogCallStartHangoutComponent;
});
