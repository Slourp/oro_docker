- [CampaignBundle](#campaignbundle)
- [MarketingListBundle](#marketinglistbundle)
- [TrackingBundle](#trackingbundle)

CampaignBundle
--------------
* The `EmailCampaignSender::setValidator(ValidatorInterface $validator)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.6.0/src/Oro/Bundle/CampaignBundle/Model/EmailCampaignSender.php#L238 "Oro\Bundle\CampaignBundle\Model\EmailCampaignSender")</sup> method was changed to `EmailCampaignSender::setValidator(ValidatorInterface $validator)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/3.0.0/src/Oro/Bundle/CampaignBundle/Model/EmailCampaignSender.php#L235 "Oro\Bundle\CampaignBundle\Model\EmailCampaignSender")</sup>
* The `EmailCampaignHandler::__construct(Request $request, FormInterface $form, RegistryInterface $registry)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.6.0/src/Oro/Bundle/CampaignBundle/Form/Handler/EmailCampaignHandler.php#L29 "Oro\Bundle\CampaignBundle\Form\Handler\EmailCampaignHandler")</sup> method was changed to `EmailCampaignHandler::__construct(RequestStack $requestStack, FormInterface $form, RegistryInterface $registry)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/3.0.0/src/Oro/Bundle/CampaignBundle/Form/Handler/EmailCampaignHandler.php#L31 "Oro\Bundle\CampaignBundle\Form\Handler\EmailCampaignHandler")</sup>
* The `DashboardController::campaignLeadsAction($widget)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.6.0/src/Oro/Bundle/CampaignBundle/Controller/Dashboard/DashboardController.php#L24 "Oro\Bundle\CampaignBundle\Controller\Dashboard\DashboardController")</sup> method was changed to `DashboardController::campaignLeadsAction(Request $request, $widget)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/3.0.0/src/Oro/Bundle/CampaignBundle/Controller/Dashboard/DashboardController.php#L27 "Oro\Bundle\CampaignBundle\Controller\Dashboard\DashboardController")</sup>
* The `CampaignSelectType::setDefaultOptions`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.6.0/src/Oro/Bundle/CampaignBundle/Form/Type/CampaignSelectType.php#L13 "Oro\Bundle\CampaignBundle\Form\Type\CampaignSelectType::setDefaultOptions")</sup> method was removed.
* The `CampaignType::setDefaultOptions`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.6.0/src/Oro/Bundle/CampaignBundle/Form/Type/CampaignType.php#L86 "Oro\Bundle\CampaignBundle\Form\Type\CampaignType::setDefaultOptions")</sup> method was removed.
* The `EmailCampaignType::setDefaultOptions`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.6.0/src/Oro/Bundle/CampaignBundle/Form/Type/EmailCampaignType.php#L118 "Oro\Bundle\CampaignBundle\Form\Type\EmailCampaignType::setDefaultOptions")</sup> method was removed.
* The `EmailTransportSelectType::setDefaultOptions`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.6.0/src/Oro/Bundle/CampaignBundle/Form/Type/EmailTransportSelectType.php#L28 "Oro\Bundle\CampaignBundle\Form\Type\EmailTransportSelectType::setDefaultOptions")</sup> method was removed.
* The `InternalTransportSettingsType::setDefaultOptions`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.6.0/src/Oro/Bundle/CampaignBundle/Form/Type/InternalTransportSettingsType.php#L37 "Oro\Bundle\CampaignBundle\Form\Type\InternalTransportSettingsType::setDefaultOptions")</sup> method was removed.
* The `EmailCampaignHandler::$request`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.6.0/src/Oro/Bundle/CampaignBundle/Form/Handler/EmailCampaignHandler.php#L16 "Oro\Bundle\CampaignBundle\Form\Handler\EmailCampaignHandler::$request")</sup> property was removed.

MarketingListBundle
-------------------
* The `MarketingListSelectType::setDefaultOptions`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.6.0/src/Oro/Bundle/MarketingListBundle/Form/Type/MarketingListSelectType.php#L12 "Oro\Bundle\MarketingListBundle\Form\Type\MarketingListSelectType::setDefaultOptions")</sup> method was removed.
* The `MarketingListTypeRemovedItemType::setDefaultOptions`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.6.0/src/Oro/Bundle/MarketingListBundle/Form/Type/MarketingListTypeRemovedItemType.php#L31 "Oro\Bundle\MarketingListBundle\Form\Type\MarketingListTypeRemovedItemType::setDefaultOptions")</sup> method was removed.
* The `MarketingListTypeUnsubscribedItemType::setDefaultOptions`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.6.0/src/Oro/Bundle/MarketingListBundle/Form/Type/MarketingListTypeUnsubscribedItemType.php#L31 "Oro\Bundle\MarketingListBundle\Form\Type\MarketingListTypeUnsubscribedItemType::setDefaultOptions")</sup> method was removed.
* The `MarketingListHandler::__construct(FormInterface $form, Request $request, RegistryInterface $doctrine, ValidatorInterface $validator, TranslatorInterface $translator)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.6.0/src/Oro/Bundle/MarketingListBundle/Form/Handler/MarketingListHandler.php#L63 "Oro\Bundle\MarketingListBundle\Form\Handler\MarketingListHandler")</sup> method was changed to `MarketingListHandler::__construct(FormInterface $form, RequestStack $requestStack, RegistryInterface $doctrine, ValidatorInterface $validator, TranslatorInterface $translator)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/3.0.0/src/Oro/Bundle/MarketingListBundle/Form/Handler/MarketingListHandler.php#L64 "Oro\Bundle\MarketingListBundle\Form\Handler\MarketingListHandler")</sup>
* The `MarketingListController::contactInformationFieldTypeAction()`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.6.0/src/Oro/Bundle/MarketingListBundle/Controller/Api/Rest/MarketingListController.php#L49 "Oro\Bundle\MarketingListBundle\Controller\Api\Rest\MarketingListController")</sup> method was changed to `MarketingListController::contactInformationFieldTypeAction(Request $request)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/3.0.0/src/Oro/Bundle/MarketingListBundle/Controller/Api/Rest/MarketingListController.php#L50 "Oro\Bundle\MarketingListBundle\Controller\Api\Rest\MarketingListController")</sup>
* The `MarketingListHandler::$request`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.6.0/src/Oro/Bundle/MarketingListBundle/Form/Handler/MarketingListHandler.php#L39 "Oro\Bundle\MarketingListBundle\Form\Handler\MarketingListHandler::$request")</sup> property was removed.

TrackingBundle
--------------
* The `TrackingWebsiteType::setDefaultOptions`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.6.0/src/Oro/Bundle/TrackingBundle/Form/Type/TrackingWebsiteType.php#L59 "Oro\Bundle\TrackingBundle\Form\Type\TrackingWebsiteType::setDefaultOptions")</sup> method was removed.
* The `TrackingWebsiteHandler::__construct(FormInterface $form, Request $request, ObjectManager $manager)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.6.0/src/Oro/Bundle/TrackingBundle/Form/Handler/TrackingWebsiteHandler.php#L34 "Oro\Bundle\TrackingBundle\Form\Handler\TrackingWebsiteHandler")</sup> method was changed to `TrackingWebsiteHandler::__construct(FormInterface $form, RequestStack $requestStack, ObjectManager $manager)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/3.0.0/src/Oro/Bundle/TrackingBundle/Form/Handler/TrackingWebsiteHandler.php#L35 "Oro\Bundle\TrackingBundle\Form\Handler\TrackingWebsiteHandler")</sup>
* The `TrackingWebsiteHandler::$request`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.6.0/src/Oro/Bundle/TrackingBundle/Form/Handler/TrackingWebsiteHandler.php#L22 "Oro\Bundle\TrackingBundle\Form\Handler\TrackingWebsiteHandler::$request")</sup> property was removed.
