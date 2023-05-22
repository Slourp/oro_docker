- [CampaignBundle](#campaignbundle)
- [MarketingActivityBundle](#marketingactivitybundle)
- [MarketingListBundle](#marketinglistbundle)
- [TrackingBundle](#trackingbundle)

CampaignBundle
--------------
* The following classes were removed:
   - `ExtendCampaign`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/CampaignBundle/Model/ExtendCampaign.php#L5 "Oro\Bundle\CampaignBundle\Model\ExtendCampaign")</sup>
   - `ExtendEmailCampaign`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/CampaignBundle/Model/ExtendEmailCampaign.php#L5 "Oro\Bundle\CampaignBundle\Model\ExtendEmailCampaign")</sup>
   - `ExtendEmailCampaignStatistics`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/CampaignBundle/Model/ExtendEmailCampaignStatistics.php#L5 "Oro\Bundle\CampaignBundle\Model\ExtendEmailCampaignStatistics")</sup>
   - `Topics`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/CampaignBundle/Async/Topics.php#L8 "Oro\Bundle\CampaignBundle\Async\Topics")</sup>
* The `EmailTransport::send(EmailCampaign $campaign, $entity, $from, $to)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/CampaignBundle/Transport/EmailTransport.php#L50 "Oro\Bundle\CampaignBundle\Transport\EmailTransport")</sup> method was changed to `EmailTransport::send(EmailCampaign $campaign, $entity, $from, $to)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/CampaignBundle/Transport/EmailTransport.php#L50 "Oro\Bundle\CampaignBundle\Transport\EmailTransport")</sup>
* The `EmailCampaignSender::__construct(MarketingListProvider $marketingListProvider, ConfigManager $configManager, EmailCampaignStatisticsConnector $statisticsConnector, ContactInformationFieldsProvider $contactInformationFieldsProvider, ManagerRegistry $registry, EmailTransportProvider $emailTransportProvider)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/CampaignBundle/Model/EmailCampaignSender.php#L72 "Oro\Bundle\CampaignBundle\Model\EmailCampaignSender")</sup> method was changed to `EmailCampaignSender::__construct(MarketingListProvider $marketingListProvider, ConfigManager $configManager, EmailCampaignStatisticsConnector $statisticsConnector, ContactInformationFieldsProvider $contactInformationFieldsProvider, ManagerRegistry $registry, EmailTransportProvider $emailTransportProvider)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/CampaignBundle/Model/EmailCampaignSender.php#L72 "Oro\Bundle\CampaignBundle\Model\EmailCampaignSender")</sup>
* The `TransportSettingsEmailTemplateListener::fillEmailTemplateChoices(FormInterface $form, $entityName)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/CampaignBundle/Form/EventListener/TransportSettingsEmailTemplateListener.php#L91 "Oro\Bundle\CampaignBundle\Form\EventListener\TransportSettingsEmailTemplateListener")</sup> method was changed to `TransportSettingsEmailTemplateListener::fillEmailTemplateChoices(FormInterface $form, $entityName)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/CampaignBundle/Form/EventListener/TransportSettingsEmailTemplateListener.php#L87 "Oro\Bundle\CampaignBundle\Form\EventListener\TransportSettingsEmailTemplateListener")</sup>
* The `CampaignDataProvider::getCampaignLeadsData($dateRange)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/CampaignBundle/Dashboard/CampaignDataProvider.php#L50 "Oro\Bundle\CampaignBundle\Dashboard\CampaignDataProvider")</sup> method was changed to `CampaignDataProvider::getCampaignLeadsData($dateRange, $hideCampaign = true, $maxResults)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/CampaignBundle/Dashboard/CampaignDataProvider.php#L45 "Oro\Bundle\CampaignBundle\Dashboard\CampaignDataProvider")</sup>
* The `DashboardController::campaignLeadsAction(Request $request, $widget)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/CampaignBundle/Controller/Dashboard/DashboardController.php#L45 "Oro\Bundle\CampaignBundle\Controller\Dashboard\DashboardController")</sup> method was changed to `DashboardController::campaignLeadsAction(Request $request, $widget)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/CampaignBundle/Controller/Dashboard/DashboardController.php#L43 "Oro\Bundle\CampaignBundle\Controller\Dashboard\DashboardController")</sup>
* The `EmailTemplateController::cgetAction($id = null)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/CampaignBundle/Controller/Api/Rest/EmailTemplateController.php#L28 "Oro\Bundle\CampaignBundle\Controller\Api\Rest\EmailTemplateController")</sup> method was changed to `EmailTemplateController::cgetAction($id = null, $includeNonEntity = true, $includeSystemTemplates = false)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/CampaignBundle/Controller/Api/Rest/EmailTemplateController.php#L24 "Oro\Bundle\CampaignBundle\Controller\Api\Rest\EmailTemplateController")</sup>
* The `CalculateTrackingEventSummaryCommand::__construct(FeatureChecker $featureChecker, DoctrineHelper $doctrineHelper)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/CampaignBundle/Command/CalculateTrackingEventSummaryCommand.php#L30 "Oro\Bundle\CampaignBundle\Command\CalculateTrackingEventSummaryCommand")</sup> method was changed to `CalculateTrackingEventSummaryCommand::__construct(ManagerRegistry $doctrine)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/CampaignBundle/Command/CalculateTrackingEventSummaryCommand.php#L31 "Oro\Bundle\CampaignBundle\Command\CalculateTrackingEventSummaryCommand")</sup>
* The `SendEmailCampaignsCommand::__construct(ManagerRegistry $registry, FeatureChecker $featureChecker, EmailCampaignSenderBuilder $emailCampaignSenderBuilder)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/CampaignBundle/Command/SendEmailCampaignsCommand.php#L28 "Oro\Bundle\CampaignBundle\Command\SendEmailCampaignsCommand")</sup> method was changed to `SendEmailCampaignsCommand::__construct(ManagerRegistry $doctrine, EmailCampaignSenderBuilder $emailCampaignSenderBuilder)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/CampaignBundle/Command/SendEmailCampaignsCommand.php#L29 "Oro\Bundle\CampaignBundle\Command\SendEmailCampaignsCommand")</sup>
* The `TransportInterface::send(EmailCampaign $campaign, $entity, $from, $to)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/CampaignBundle/Transport/TransportInterface.php#L16 "Oro\Bundle\CampaignBundle\Transport\TransportInterface")</sup> method was changed to `TransportInterface::send(EmailCampaign $campaign, $entity, $from, $to)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/CampaignBundle/Transport/TransportInterface.php#L19 "Oro\Bundle\CampaignBundle\Transport\TransportInterface")</sup>

MarketingActivityBundle
-----------------------
* The `ExtendMarketingActivity`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/MarketingActivityBundle/Model/ExtendMarketingActivity.php#L11 "Oro\Bundle\MarketingActivityBundle\Model\ExtendMarketingActivity")</sup> class was removed.
* The `MarketingActivityVirtualRelationProvider::__construct(DoctrineHelper $doctrineHelper, EntityProvider $entityProvider)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/MarketingActivityBundle/Provider/MarketingActivityVirtualRelationProvider.php#L33 "Oro\Bundle\MarketingActivityBundle\Provider\MarketingActivityVirtualRelationProvider")</sup> method was changed to `MarketingActivityVirtualRelationProvider::__construct(EntityProvider $entityProvider)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/MarketingActivityBundle/Provider/MarketingActivityVirtualRelationProvider.php#L20 "Oro\Bundle\MarketingActivityBundle\Provider\MarketingActivityVirtualRelationProvider")</sup>
* The `MarketingActivityVirtualRelationProvider::$doctrineHelper`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/MarketingActivityBundle/Provider/MarketingActivityVirtualRelationProvider.php#L21 "Oro\Bundle\MarketingActivityBundle\Provider\MarketingActivityVirtualRelationProvider::$doctrineHelper")</sup> property was removed.

MarketingListBundle
-------------------
* The `ExtendMarketingList`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/MarketingListBundle/Model/ExtendMarketingList.php#L5 "Oro\Bundle\MarketingListBundle\Model\ExtendMarketingList")</sup> class was removed.
* The `MarketingListAllowedClassesProvider::__construct(CacheProvider $cacheProvider, EntityProvider $entityProvider)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/MarketingListBundle/Provider/MarketingListAllowedClassesProvider.php#L26 "Oro\Bundle\MarketingListBundle\Provider\MarketingListAllowedClassesProvider")</sup> method was changed to `MarketingListAllowedClassesProvider::__construct(CacheInterface $cacheProvider, EntityProvider $entityProvider)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/MarketingListBundle/Provider/MarketingListAllowedClassesProvider.php#L19 "Oro\Bundle\MarketingListBundle\Provider\MarketingListAllowedClassesProvider")</sup>
* The `MarketingListVirtualRelationProvider::__construct(DoctrineHelper $doctrineHelper, CacheProvider $cacheProvider)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/MarketingListBundle/Provider/MarketingListVirtualRelationProvider.php#L30 "Oro\Bundle\MarketingListBundle\Provider\MarketingListVirtualRelationProvider")</sup> method was changed to `MarketingListVirtualRelationProvider::__construct(DoctrineHelper $doctrineHelper, CacheInterface $cacheProvider)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/MarketingListBundle/Provider/MarketingListVirtualRelationProvider.php#L23 "Oro\Bundle\MarketingListBundle\Provider\MarketingListVirtualRelationProvider")</sup>
* The `MarketingListItemConnector::__construct(ManagerRegistry $registry, DoctrineHelper $doctrineHelper)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/MarketingListBundle/Model/MarketingListItemConnector.php#L24 "Oro\Bundle\MarketingListBundle\Model\MarketingListItemConnector")</sup> method was changed to `MarketingListItemConnector::__construct(ManagerRegistry $doctrine, DoctrineHelper $doctrineHelper)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/MarketingListBundle/Model/MarketingListItemConnector.php#L18 "Oro\Bundle\MarketingListBundle\Model\MarketingListItemConnector")</sup>
* The `MarketingListEntityListener::__construct(CacheProvider $cacheProvider)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/MarketingListBundle/EventListener/MarketingListEntityListener.php#L19 "Oro\Bundle\MarketingListBundle\EventListener\MarketingListEntityListener")</sup> method was changed to `MarketingListEntityListener::__construct(CacheInterface $cacheProvider)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/MarketingListBundle/EventListener/MarketingListEntityListener.php#L16 "Oro\Bundle\MarketingListBundle\EventListener\MarketingListEntityListener")</sup>
* The `UpdateMarketingListProcessor::__construct(DoctrineHelper $doctrineHelper, EventDispatcherInterface $dispatcher, LoggerInterface $logger)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/MarketingListBundle/Async/UpdateMarketingListProcessor.php#L36 "Oro\Bundle\MarketingListBundle\Async\UpdateMarketingListProcessor")</sup> method was changed to `UpdateMarketingListProcessor::__construct(DoctrineHelper $doctrineHelper, EventDispatcherInterface $dispatcher)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/MarketingListBundle/Async/UpdateMarketingListProcessor.php#L31 "Oro\Bundle\MarketingListBundle\Async\UpdateMarketingListProcessor")</sup>
* The `MarketingListItemConnector::$registry`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/MarketingListBundle/Model/MarketingListItemConnector.php#L17 "Oro\Bundle\MarketingListBundle\Model\MarketingListItemConnector::$registry")</sup> property was removed.
* The `MarketingListHandler::$registry`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/MarketingListBundle/Form/Handler/MarketingListHandler.php#L38 "Oro\Bundle\MarketingListBundle\Form\Handler\MarketingListHandler::$registry")</sup> property was removed.
* The `OroMarketingListExtension::getAlias`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/MarketingListBundle/DependencyInjection/OroMarketingListExtension.php#L34 "Oro\Bundle\MarketingListBundle\DependencyInjection\OroMarketingListExtension::getAlias")</sup> method was removed.

TrackingBundle
--------------
* The following classes were removed:
   - `IdentifierVisitGeneratorExtension`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Tools/IdentifierVisitGeneratorExtension.php#L13 "Oro\Bundle\TrackingBundle\Tools\IdentifierVisitGeneratorExtension")</sup>
   - `VisitEventAssociationGeneratorExtension`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Tools/VisitEventAssociationGeneratorExtension.php#L14 "Oro\Bundle\TrackingBundle\Tools\VisitEventAssociationGeneratorExtension")</sup>
   - `ExtendTrackingEvent`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Model/ExtendTrackingEvent.php#L5 "Oro\Bundle\TrackingBundle\Model\ExtendTrackingEvent")</sup>
   - `ExtendTrackingVisit`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Model/ExtendTrackingVisit.php#L5 "Oro\Bundle\TrackingBundle\Model\ExtendTrackingVisit")</sup>
   - `ExtendTrackingVisitEvent`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Model/ExtendTrackingVisitEvent.php#L5 "Oro\Bundle\TrackingBundle\Model\ExtendTrackingVisitEvent")</sup>
   - `ExtendTrackingWebsite`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Model/ExtendTrackingWebsite.php#L5 "Oro\Bundle\TrackingBundle\Model\ExtendTrackingWebsite")</sup>
   - `Topics`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Async/Topics.php#L5 "Oro\Bundle\TrackingBundle\Async\Topics")</sup>
* The following methods in class `TrackingProcessor`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L85 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor")</sup> were removed:
   - `setMaxExecutionTime`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L85 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::setMaxExecutionTime")</sup>
   - `hasEntitiesToProcess`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L96 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::hasEntitiesToProcess")</sup>
   - `logBatch`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L181 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::logBatch")</sup>
   - `checkMaxExecutionTime`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L198 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::checkMaxExecutionTime")</sup>
   - `getEventsCount`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L217 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::getEventsCount")</sup>
   - `getIdentifyPrevVisitsCount`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L230 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::getIdentifyPrevVisitsCount")</sup>
   - `getIdentifyPrevVisitEventsCount`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L253 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::getIdentifyPrevVisitEventsCount")</sup>
   - `identifyPrevVisitEvents`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L274 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::identifyPrevVisitEvents")</sup>
   - `identifyPrevVisits`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L316 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::identifyPrevVisits")</sup>
   - `processVisits`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L454 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::processVisits")</sup>
   - `createNotParsedEntityQueryBuilder`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L474 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::createNotParsedEntityQueryBuilder")</sup>
   - `getTrackingVisit`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L544 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::getTrackingVisit")</sup>
   - `processUserAgentString`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L605 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::processUserAgentString")</sup>
   - `getEventType`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L632 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::getEventType")</sup>
   - `identifyTrackingVisit`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L666 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::identifyTrackingVisit")</sup>
   - `getEntityManager`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L694 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::getEntityManager")</sup>
   - `getMaxRetriesCount`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L711 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::getMaxRetriesCount")</sup>
   - `getBatchSize`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L721 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::getBatchSize")</sup>
   - `getCurrentUtcDateTime`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L731 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::getCurrentUtcDateTime")</sup>
* The following methods in class `TrackingProcessor`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L35 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor")</sup> were changed:
  > - `__construct(ManagerRegistry $doctrine, TrackingEventIdentificationProvider $trackingIdentification)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L70 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor")</sup>
  > - `__construct(ManagerRegistry $doctrine, TrackingEventIdentificationProvider $trackingIdentification, ValidatorInterface $validator)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L35 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor")</sup>

  > - `updateVisits($entities)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L370 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor")</sup>
  > - `updateVisits($trackingVisits)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L105 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor")</sup>

* The `ConfigListener::__construct(ConfigManager $configManager, RouterInterface $router, $logsDir)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/EventListener/ConfigListener.php#L28 "Oro\Bundle\TrackingBundle\EventListener\ConfigListener")</sup> method was changed to `ConfigListener::__construct(ConfigManager $configManager, RouterInterface $router, TrackingDataFolderSelector $trackingDataFolderSelector)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/TrackingBundle/EventListener/ConfigListener.php#L30 "Oro\Bundle\TrackingBundle\EventListener\ConfigListener")</sup>
* The `ImportLogsCommand::__construct(DoctrineJobRepository $doctrineJobRepository, FeatureChecker $featureChecker, JobExecutor $jobExecutor, ConfigManager $configManager, $kernelLogsDir)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Command/ImportLogsCommand.php#L40 "Oro\Bundle\TrackingBundle\Command\ImportLogsCommand")</sup> method was changed to `ImportLogsCommand::__construct(DoctrineJobRepository $doctrineJobRepository, JobExecutor $jobExecutor, ConfigManager $configManager, TrackingDataFolderSelector $trackingDataFolderSelector)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/TrackingBundle/Command/ImportLogsCommand.php#L41 "Oro\Bundle\TrackingBundle\Command\ImportLogsCommand")</sup>
* The `TrackCommand::__construct(FeatureChecker $featureChecker, TrackingProcessor $trackingProcessor)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Command/TrackCommand.php#L28 "Oro\Bundle\TrackingBundle\Command\TrackCommand")</sup> method was changed to `TrackCommand::__construct(TrackingProcessor $trackingProcessor)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/TrackingBundle/Command/TrackCommand.php#L29 "Oro\Bundle\TrackingBundle\Command\TrackCommand")</sup>
* The `AggregateTrackingVisitsProcessor::__construct(UniqueTrackingVisitDumper $trackingVisitDumper, ConfigManager $configManager, LoggerInterface $logger)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Async/AggregateTrackingVisitsProcessor.php#L30 "Oro\Bundle\TrackingBundle\Async\AggregateTrackingVisitsProcessor")</sup> method was changed to `AggregateTrackingVisitsProcessor::__construct(UniqueTrackingVisitDumper $trackingVisitDumper, ConfigManager $configManager)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.1.0/src/Oro/Bundle/TrackingBundle/Async/AggregateTrackingVisitsProcessor.php#L30 "Oro\Bundle\TrackingBundle\Async\AggregateTrackingVisitsProcessor")</sup>
* The following properties in class `TrackingProcessor`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L41 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor")</sup> were removed:
   - `$doctrine`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L41 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::$doctrine")</sup>
   - `$startTime`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L62 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::$startTime")</sup>
   - `$maxExecTimeout`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L65 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::$maxExecTimeout")</sup>
   - `$maxExecTime`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/5.0.0/src/Oro/Bundle/TrackingBundle/Processor/TrackingProcessor.php#L68 "Oro\Bundle\TrackingBundle\Processor\TrackingProcessor::$maxExecTime")</sup>
