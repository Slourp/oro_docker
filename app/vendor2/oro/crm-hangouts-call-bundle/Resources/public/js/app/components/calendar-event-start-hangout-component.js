define(function(require) {
    'use strict';

    const _ = require('underscore');
    const StartButtonView = require('../views/start-button-view');
    const BaseComponent = require('oroui/js/app/components/base/component');

    const CalendarEventStartHangoutComponent = BaseComponent.extend({
        /**
         * @type {Object}
         */
        calendarEvent: null,

        /**
         * @type {Object}
         */
        hangoutOptions: null,

        /**
         * @type {Integer}
         */
        ownerUserId: null,

        /**
         * @type {String}
         */
        declinedStatus: null,

        /**
         * @inheritdoc
         */
        constructor: function CalendarEventStartHangoutComponent(options) {
            CalendarEventStartHangoutComponent.__super__.constructor.call(this, options);
        },

        /**
         * @inheritdoc
         */
        initialize: function(options) {
            _.extend(
                this,
                _.defaults(
                    _.pick(options, ['calendarEvent', 'hangoutOptions', 'ownerUserId', 'declinedStatus']),
                    {
                        hangoutOptions: {}
                    }
                )
            );
            if (!this.calendarEvent) {
                throw new TypeError('Missing required option "calendarEvent"');
            }

            this.startButtonView = new StartButtonView({
                el: options._sourceElement,
                hangoutOptions: this.hangoutOptions
            });

            const attendees = this.getAttendeesApplicableToInvite();
            if (attendees.length) {
                this.renderStartButton(attendees);
            } else {
                this.disableStartButton();
            }
        },

        /**
         * Get attendees of the event applicable for hangouts invitation:
         * - email is not empty
         * - status is not declined
         * - user is not owner user
         */
        getAttendeesApplicableToInvite: function() {
            return _.filter(this.calendarEvent.attendees, function(attendee) {
                return attendee.status !== this.declinedStatus &&
                    attendee.email && attendee.email.length > 0 &&
                    attendee.userId !== this.ownerUserId;
            }, this);
        },

        renderStartButton: function(attendees) {
            const invites = _.map(attendees, function(attendee) {
                return {
                    id: attendee.email,
                    invite_type: 'EMAIL'
                };
            });

            this.startButtonView.setHangoutOptions(_.extend({}, this.hangoutOptions, {
                invites: invites
            }));
            this.startButtonView.render();
        },

        disableStartButton: function() {
            this.startButtonView.disable();
        }
    });

    return CalendarEventStartHangoutComponent;
});
