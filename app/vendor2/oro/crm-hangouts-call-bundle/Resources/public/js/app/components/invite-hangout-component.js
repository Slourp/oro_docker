define(function(require) {
    'use strict';

    const _ = require('underscore');
    const mediator = require('oroui/js/mediator');
    const __ = require('orotranslation/js/translator');
    const InviteButtonView = require('../views/invite-button-view');
    const InviteModalView = require('../views/invite-modal-view');
    const HangoutsEventBroker = require('orohangoutscall/js/hangouts-event-broker');
    const WidgetComponent = require('oroui/js/app/components/widget-component');
    const BaseComponent = require('oroui/js/app/components/base/component');

    const InviteHangoutComponent = BaseComponent.extend({
        /** @type {Object} */
        modalOptions: null,

        /** @type {Object} */
        onAppStartOptions: null,

        /** @type {HangoutsEventBroker} */
        eventBroker: null,

        /**
         * @inheritdoc
         */
        constructor: function InviteHangoutComponent(options) {
            InviteHangoutComponent.__super__.constructor.call(this, options);
        },

        /**
         * Initializes InviteHangout component
         *
         * @param {Object} options
         * @param {Object} options.modalOptions options for invite hangout modal dialog
         * @param {Object} options.onAppStartOptions options for modal dialog
         */
        initialize: function(options) {
            _.extend(this, _.defaults(_.pick(options, ['modalOptions', 'onAppStartOptions']), {
                modalOptions: {}
            }));

            this.inviteButtonView = new InviteButtonView({
                el: options._sourceElement[0]
            });
            this.listenTo(this.inviteButtonView, 'invite', this.openInviteModal);
        },

        /**
         * Opens InviteModal dialog
         *  -
         */
        openInviteModal: function() {
            this.ensureEventBroker();

            const modalOptions = _.extend({
                token: this.eventBroker.getToken()
            }, this.modalOptions);
            this.inviteModal = new InviteModalView(modalOptions);

            this.listenTo(this.inviteModal, {
                'hidden': this.onInviteModalHide,
                'fail': this.onStartButtonFail,
                'application-start': this.onHangoutAppStart
            });

            this.inviteModal.open();
        },

        /**
         * Create a new eventBroker (disposes existed, if there's one)
         * and subscribes handler on 'application-start' event
         */
        ensureEventBroker: function() {
            if (this.eventBroker) {
                this.unsetEventBroker();
            }
            this.eventBroker = new HangoutsEventBroker();
            this.listenTo(this.eventBroker, 'application-start', this.onHangoutAppStart);
        },

        /**
         * Disposes and unset instance or HangoutEventBroker
         */
        unsetEventBroker: function() {
            this.stopListening(this.eventBroker);
            this.eventBroker.dispose();
            delete this.eventBroker;
        },

        /**
         * Unset instance or InviteHangoutModal dialog
         */
        unsetInviteModal: function() {
            this.stopListening(this.inviteModal);
            delete this.inviteModal;
        },

        /**
         * Handles InviteHangoutModal dialog hide action
         */
        onInviteModalHide: function() {
            this.unsetInviteModal();
        },

        /**
         * Handles StartHangoutButton initialization fail
         */
        onStartButtonFail: function() {
            if (this.inviteModal) {
                this.inviteModal.close();
            }
            mediator.execute('showErrorMessage', __('oro.hangoutscall.messages.connection_error'));
        },

        /**
         * Handles application start
         *  - closes InviteHangoutModal dialog
         *  - opens onAppStart widget if there's defined one
         *  - unbind eventBroker instance and passes it to other component or dispose
         */
        onHangoutAppStart: function() {
            // close inviteModal dialog
            if (this.inviteModal) {
                this.inviteModal.close();
            }

            // unbind eventBroker to pass into some other component (if there's one)
            const eventBroker = this.eventBroker;
            this.stopListening(this.eventBroker);
            delete this.eventBroker;

            const opts = this.onAppStartOptions;
            if (opts && opts.widgetComponentOptions && opts.targetComponentName) {
                this.passEventBrokerToComponentOfWidget(
                    opts.widgetComponentOptions,
                    opts.targetComponentName,
                    eventBroker
                );
            } else {
                eventBroker.dispose();
            }
        },

        /**
         * Creates and opens a widget via WidgetComponent,
         * passes eventBroker instance into target component of an opened widget
         *
         * @param {Object} widgetComponentOptions - options for a widget component
         * @param {string} targetComponentName - name of component inside the widget that accepts eventBroker
         * @param {HangoutsEventBroker} eventBroker
         */
        passEventBrokerToComponentOfWidget: function(widgetComponentOptions, targetComponentName, eventBroker) {
            const widgetComponent = new WidgetComponent(widgetComponentOptions);
            widgetComponent.openWidget().done(function(widget) {
                if (widget && widget.pageComponent(targetComponentName)) {
                    const targetComponent = widget.pageComponent(targetComponentName);
                    if (_.isFunction(targetComponent.setExternalEventBroker)) {
                        targetComponent.setExternalEventBroker(eventBroker);
                        return;
                    }
                }
                eventBroker.dispose();
            }).fail(function() {
                eventBroker.dispose();
            }).always(function() {
                widgetComponent.dispose();
            });
        }
    });

    return InviteHangoutComponent;
});
