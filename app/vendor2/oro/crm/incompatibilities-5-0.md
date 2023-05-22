- [AccountBundle](#accountbundle)
- [ActivityContactBundle](#activitycontactbundle)
- [AnalyticsBundle](#analyticsbundle)
- [CRMBundle](#crmbundle)
- [CallCRM](#callcrm)
- [CaseBundle](#casebundle)
- [ChannelBundle](#channelbundle)
- [ContactBundle](#contactbundle)
- [ReportCRMBundle](#reportcrmbundle)
- [SalesBundle](#salesbundle)
- [TestFrameworkCRMBundle](#testframeworkcrmbundle)

AccountBundle
-------------
* The `Configuration`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/AccountBundle/DependencyInjection/Configuration.php#L8 "Oro\Bundle\AccountBundle\DependencyInjection\Configuration")</sup> class was removed.

ActivityContactBundle
---------------------
* The `Configuration`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ActivityContactBundle/DependencyInjection/Configuration.php#L8 "Oro\Bundle\ActivityContactBundle\DependencyInjection\Configuration")</sup> class was removed.

AnalyticsBundle
---------------
* The `Configuration`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/AnalyticsBundle/DependencyInjection/Configuration.php#L8 "Oro\Bundle\AnalyticsBundle\DependencyInjection\Configuration")</sup> class was removed.
* The `OroAnalyticsBundle::build`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/AnalyticsBundle/OroAnalyticsBundle.php#L18 "Oro\Bundle\AnalyticsBundle\OroAnalyticsBundle::build")</sup> method was removed.

CRMBundle
---------
* The `ExtendEntityCacheWarmer::__construct(ManagerRegistry $managerRegistry, LoggerInterface $logger, $applicationInstalled)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/CRMBundle/CacheWarmer/ExtendEntityCacheWarmer.php#L23 "Oro\Bundle\CRMBundle\CacheWarmer\ExtendEntityCacheWarmer")</sup> method was changed to `ExtendEntityCacheWarmer::__construct(ManagerRegistry $managerRegistry, LoggerInterface $logger, ApplicationState $applicationState)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/CRMBundle/CacheWarmer/ExtendEntityCacheWarmer.php#L24 "Oro\Bundle\CRMBundle\CacheWarmer\ExtendEntityCacheWarmer")</sup>

CallCRM
-------
* The `Configuration`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bridge/CallCRM/DependencyInjection/Configuration.php#L8 "Oro\Bridge\CallCRM\DependencyInjection\Configuration")</sup> class was removed.

CaseBundle
----------
* The `Configuration`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/CaseBundle/DependencyInjection/Configuration.php#L8 "Oro\Bundle\CaseBundle\DependencyInjection\Configuration")</sup> class was removed.
* The `ViewFactory::__construct(AuthorizationCheckerInterface $authorizationChecker, RouterInterface $router, EntityNameResolver $entityNameResolver, DateTimeFormatterInterface $dateTimeFormatter, AttachmentManager $attachmentManager)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/CaseBundle/Model/ViewFactory.php#L45 "Oro\Bundle\CaseBundle\Model\ViewFactory")</sup> method was changed to `ViewFactory::__construct(AuthorizationCheckerInterface $authorizationChecker, RouterInterface $router, EntityNameResolver $entityNameResolver, DateTimeFormatterInterface $dateTimeFormatter, PictureSourcesProviderInterface $pictureSourcesProvider)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/CaseBundle/Model/ViewFactory.php#L29 "Oro\Bundle\CaseBundle\Model\ViewFactory")</sup>
* The following methods in class `CaseController`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/CaseBundle/Controller/CaseController.php#L77 "Oro\Bundle\CaseBundle\Controller\CaseController")</sup> were changed:
  > - `createAction()`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/CaseBundle/Controller/CaseController.php#L68 "Oro\Bundle\CaseBundle\Controller\CaseController")</sup>
  > - `createAction(Request $request)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/CaseBundle/Controller/CaseController.php#L77 "Oro\Bundle\CaseBundle\Controller\CaseController")</sup>

  > - `update(CaseEntity $case)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/CaseBundle/Controller/CaseController.php#L89 "Oro\Bundle\CaseBundle\Controller\CaseController")</sup>
  > - `update(CaseEntity $case, Request $request)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/CaseBundle/Controller/CaseController.php#L99 "Oro\Bundle\CaseBundle\Controller\CaseController")</sup>

* The following properties in class `ViewFactory`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/CaseBundle/Model/ViewFactory.php#L33 "Oro\Bundle\CaseBundle\Model\ViewFactory")</sup> were removed:
   - `$imageCacheManager`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/CaseBundle/Model/ViewFactory.php#L33 "Oro\Bundle\CaseBundle\Model\ViewFactory::$imageCacheManager")</sup>
   - `$attachmentManager`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/CaseBundle/Model/ViewFactory.php#L36 "Oro\Bundle\CaseBundle\Model\ViewFactory::$attachmentManager")</sup>
* The `CasePriorityTranslation::$content`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/CaseBundle/Entity/CasePriorityTranslation.php#L30 "Oro\Bundle\CaseBundle\Entity\CasePriorityTranslation::$content")</sup> property was removed.
* The `CaseSourceTranslation::$content`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/CaseBundle/Entity/CaseSourceTranslation.php#L30 "Oro\Bundle\CaseBundle\Entity\CaseSourceTranslation::$content")</sup> property was removed.
* The `CaseStatusTranslation::$content`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/CaseBundle/Entity/CaseStatusTranslation.php#L30 "Oro\Bundle\CaseBundle\Entity\CaseStatusTranslation::$content")</sup> property was removed.

ChannelBundle
-------------
* The following classes were removed:
   - `LifetimeValueExtension`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ChannelBundle/Twig/LifetimeValueExtension.php#L17 "Oro\Bundle\ChannelBundle\Twig\LifetimeValueExtension")</sup>
   - `MetadataExtension`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ChannelBundle/Twig/MetadataExtension.php#L16 "Oro\Bundle\ChannelBundle\Twig\MetadataExtension")</sup>
   - `ProcessChannelStateProcessor`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ChannelBundle/Async/ProcessChannelStateProcessor.php#L10 "Oro\Bundle\ChannelBundle\Async\ProcessChannelStateProcessor")</sup>
* The `OroChannelBundle::build`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ChannelBundle/OroChannelBundle.php#L18 "Oro\Bundle\ChannelBundle\OroChannelBundle::build")</sup> method was removed.
* The `LifetimeValueHistory::__construct`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ChannelBundle/Entity/LifetimeValueHistory.php#L70 "Oro\Bundle\ChannelBundle\Entity\LifetimeValueHistory::__construct")</sup> method was removed.
* The `ChannelVoter::setSettingsProvider`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ChannelBundle/Acl/Voter/ChannelVoter.php#L44 "Oro\Bundle\ChannelBundle\Acl\Voter\ChannelVoter::setSettingsProvider")</sup> method was removed.
* The `AccountLifetimeListener::onClear(OnClearEventArgs $event)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ChannelBundle/EventListener/AccountLifetimeListener.php#L122 "Oro\Bundle\ChannelBundle\EventListener\AccountLifetimeListener")</sup> method was changed to `AccountLifetimeListener::onClear()`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/ChannelBundle/EventListener/AccountLifetimeListener.php#L90 "Oro\Bundle\ChannelBundle\EventListener\AccountLifetimeListener")</sup>
* The `JobExecutionSubscriber::beforeJobExecution(JobExecutionEvent $event)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ChannelBundle/EventListener/JobExecutionSubscriber.php#L49 "Oro\Bundle\ChannelBundle\EventListener\JobExecutionSubscriber")</sup> method was changed to `JobExecutionSubscriber::beforeJobExecution(JobExecutionEvent $event)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/ChannelBundle/EventListener/JobExecutionSubscriber.php#L42 "Oro\Bundle\ChannelBundle\EventListener\JobExecutionSubscriber")</sup>
* The following methods in class `ChannelController`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/ChannelBundle/Controller/ChannelController.php#L53 "Oro\Bundle\ChannelBundle\Controller\ChannelController")</sup> were changed:
  > - `createAction()`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ChannelBundle/Controller/ChannelController.php#L45 "Oro\Bundle\ChannelBundle\Controller\ChannelController")</sup>
  > - `createAction(Request $request)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/ChannelBundle/Controller/ChannelController.php#L53 "Oro\Bundle\ChannelBundle\Controller\ChannelController")</sup>

  > - `update(Channel $channel)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ChannelBundle/Controller/ChannelController.php#L70 "Oro\Bundle\ChannelBundle\Controller\ChannelController")</sup>
  > - `update(Channel $channel, Request $request)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/ChannelBundle/Controller/ChannelController.php#L79 "Oro\Bundle\ChannelBundle\Controller\ChannelController")</sup>

* The `ChangeIntegrationStatusProcessor::__construct(ManagerRegistry $registry, LoggerInterface $logger)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ChannelBundle/Async/ChangeIntegrationStatusProcessor.php#L32 "Oro\Bundle\ChannelBundle\Async\ChangeIntegrationStatusProcessor")</sup> method was changed to `ChangeIntegrationStatusProcessor::__construct(ManagerRegistry $registry, StateProvider $stateProvider)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/ChannelBundle/Async/ChangeIntegrationStatusProcessor.php#L34 "Oro\Bundle\ChannelBundle\Async\ChangeIntegrationStatusProcessor")</sup>
* The `ChannelVoter::$settingsProvider`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ChannelBundle/Acl/Voter/ChannelVoter.php#L24 "Oro\Bundle\ChannelBundle\Acl\Voter\ChannelVoter::$settingsProvider")</sup> property was removed.

ContactBundle
-------------
* The `ContactExtension::getName`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ContactBundle/Twig/ContactExtension.php#L39 "Oro\Bundle\ContactBundle\Twig\ContactExtension::getName")</sup> method was removed.
* The `ContactAddOrReplaceStrategy::importExistingEntity`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ContactBundle/ImportExport/Strategy/ContactAddOrReplaceStrategy.php#L30 "Oro\Bundle\ContactBundle\ImportExport\Strategy\ContactAddOrReplaceStrategy::importExistingEntity")</sup> method was removed.
* The `PrepareResultItemListener::prepareEmailItemDataEvent`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ContactBundle/EventListener/PrepareResultItemListener.php#L34 "Oro\Bundle\ContactBundle\EventListener\PrepareResultItemListener::prepareEmailItemDataEvent")</sup> method was removed.
* The `ContactNormalizer::normalize($object, $format = null, $context = [])`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ContactBundle/ImportExport/Serializer/Normalizer/ContactNormalizer.php#L48 "Oro\Bundle\ContactBundle\ImportExport\Serializer\Normalizer\ContactNormalizer")</sup> method was changed to `ContactNormalizer::normalize($object, $format = null, $context = [])`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/ContactBundle/ImportExport/Serializer/Normalizer/ContactNormalizer.php#L42 "Oro\Bundle\ContactBundle\ImportExport\Serializer\Normalizer\ContactNormalizer")</sup>
* The `ContactEmailApiHandler::__construct(EntityManager $entityManager, AuthorizationCheckerInterface $authorizationChecker)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ContactBundle/Handler/ContactEmailApiHandler.php#L25 "Oro\Bundle\ContactBundle\Handler\ContactEmailApiHandler")</sup> method was changed to `ContactEmailApiHandler::__construct(EntityManager $entityManager, AuthorizationCheckerInterface $authorizationChecker, PropertyAccessorInterface $propertyAccessor)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/ContactBundle/Handler/ContactEmailApiHandler.php#L27 "Oro\Bundle\ContactBundle\Handler\ContactEmailApiHandler")</sup>
* The `ContactPhoneApiHandler::__construct(EntityManager $entityManager, AuthorizationCheckerInterface $authorizationChecker)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ContactBundle/Handler/ContactPhoneApiHandler.php#L25 "Oro\Bundle\ContactBundle\Handler\ContactPhoneApiHandler")</sup> method was changed to `ContactPhoneApiHandler::__construct(EntityManager $entityManager, AuthorizationCheckerInterface $authorizationChecker, PropertyAccessorInterface $propertyAccessor)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/ContactBundle/Handler/ContactPhoneApiHandler.php#L27 "Oro\Bundle\ContactBundle\Handler\ContactPhoneApiHandler")</sup>
* The following methods in class `ImportEventListener`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/ContactBundle/EventListener/ImportEventListener.php#L25 "Oro\Bundle\ContactBundle\EventListener\ImportEventListener")</sup> were changed:
  > - `__construct(OptionalListenerManager $listenerManager)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ContactBundle/EventListener/ImportEventListener.php#L24 "Oro\Bundle\ContactBundle\EventListener\ImportEventListener")</sup>
  > - `__construct(OptionalListenerManager $optionalListenerManager, ImportExportConfigurationProviderInterface $contactImportExportConfigurationProvider, MessageProducerInterface $messageProducer)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/ContactBundle/EventListener/ImportEventListener.php#L25 "Oro\Bundle\ContactBundle\EventListener\ImportEventListener")</sup>

  > - `onBeforeJobExecution(JobExecutionEvent $jobExecutionEvent)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ContactBundle/EventListener/ImportEventListener.php#L32 "Oro\Bundle\ContactBundle\EventListener\ImportEventListener")</sup>
  > - `onBeforeJobExecution(JobExecutionEvent $jobExecutionEvent)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/ContactBundle/EventListener/ImportEventListener.php#L35 "Oro\Bundle\ContactBundle\EventListener\ImportEventListener")</sup>

* The `PrepareResultItemListener::__construct(ContactNameFormatter $nameFormatter, DoctrineHelper $doctrineHelper)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ContactBundle/EventListener/PrepareResultItemListener.php#L25 "Oro\Bundle\ContactBundle\EventListener\PrepareResultItemListener")</sup> method was changed to `PrepareResultItemListener::__construct(ContactNameFormatter $nameFormatter, ManagerRegistry $doctrine)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/ContactBundle/EventListener/PrepareResultItemListener.php#L18 "Oro\Bundle\ContactBundle\EventListener\PrepareResultItemListener")</sup>
* The `ContactApiEntityManager::__construct($class, ObjectManager $om, AttachmentManager $attachmentManager)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ContactBundle/Entity/Manager/ContactApiEntityManager.php#L23 "Oro\Bundle\ContactBundle\Entity\Manager\ContactApiEntityManager")</sup> method was changed to `ContactApiEntityManager::__construct($class, ObjectManager $om, FileApiEntityManager $fileApiEntityManager)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/ContactBundle/Entity/Manager/ContactApiEntityManager.php#L17 "Oro\Bundle\ContactBundle\Entity\Manager\ContactApiEntityManager")</sup>
* The `ContactPostImportProcessor::__construct(ContactEmailAddressHandler $contactEmailAddressHandler, DoctrineHelper $doctrineHelper, LoggerInterface $logger)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ContactBundle/Async/ContactPostImportProcessor.php#L41 "Oro\Bundle\ContactBundle\Async\ContactPostImportProcessor")</sup> method was changed to `ContactPostImportProcessor::__construct(ContactEmailAddressHandler $contactEmailAddressHandler)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/ContactBundle/Async/ContactPostImportProcessor.php#L25 "Oro\Bundle\ContactBundle\Async\ContactPostImportProcessor")</sup>
* The `PrepareResultItemListener::$doctrineHelper`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ContactBundle/EventListener/PrepareResultItemListener.php#L18 "Oro\Bundle\ContactBundle\EventListener\PrepareResultItemListener::$doctrineHelper")</sup> property was removed.
* The `ContactApiEntityManager::$attachmentManager`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ContactBundle/Entity/Manager/ContactApiEntityManager.php#L16 "Oro\Bundle\ContactBundle\Entity\Manager\ContactApiEntityManager::$attachmentManager")</sup> property was removed.

ReportCRMBundle
---------------
* The `Configuration`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/ReportCRMBundle/DependencyInjection/Configuration.php#L11 "Oro\Bundle\ReportCRMBundle\DependencyInjection\Configuration")</sup> class was removed.

SalesBundle
-----------
* The `CustomerApiTransformer`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/SalesBundle/Form/DataTransformer/CustomerApiTransformer.php#L8 "Oro\Bundle\SalesBundle\Form\DataTransformer\CustomerApiTransformer")</sup> class was removed.
* The `B2bCustomerEmailApiHandler::__construct(EntityManager $entityManager, AuthorizationCheckerInterface $authorizationChecker)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/SalesBundle/Handler/B2bCustomerEmailApiHandler.php#L25 "Oro\Bundle\SalesBundle\Handler\B2bCustomerEmailApiHandler")</sup> method was changed to `B2bCustomerEmailApiHandler::__construct(EntityManager $entityManager, AuthorizationCheckerInterface $authorizationChecker, PropertyAccessorInterface $propertyAccessor)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/SalesBundle/Handler/B2bCustomerEmailApiHandler.php#L27 "Oro\Bundle\SalesBundle\Handler\B2bCustomerEmailApiHandler")</sup>
* The `B2bCustomerPhoneApiHandler::__construct(EntityManager $entityManager, AuthorizationCheckerInterface $authorizationChecker)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/SalesBundle/Handler/B2bCustomerPhoneApiHandler.php#L25 "Oro\Bundle\SalesBundle\Handler\B2bCustomerPhoneApiHandler")</sup> method was changed to `B2bCustomerPhoneApiHandler::__construct(EntityManager $entityManager, AuthorizationCheckerInterface $authorizationChecker, PropertyAccessorInterface $propertyAccessor)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/SalesBundle/Handler/B2bCustomerPhoneApiHandler.php#L27 "Oro\Bundle\SalesBundle\Handler\B2bCustomerPhoneApiHandler")</sup>
* The `LeadPhoneApiHandler::__construct(ManagerRegistry $doctrine, AuthorizationCheckerInterface $authorizationChecker)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/SalesBundle/Handler/LeadPhoneApiHandler.php#L25 "Oro\Bundle\SalesBundle\Handler\LeadPhoneApiHandler")</sup> method was changed to `LeadPhoneApiHandler::__construct(ManagerRegistry $doctrine, AuthorizationCheckerInterface $authorizationChecker, PropertyAccessorInterface $propertyAccessor)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/SalesBundle/Handler/LeadPhoneApiHandler.php#L27 "Oro\Bundle\SalesBundle\Handler\LeadPhoneApiHandler")</sup>
* The `B2bCustomerLifetimeListener::__construct(ServiceLink $rateConverterLink, CurrencyQueryBuilderTransformerInterface $qbTransformer)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/SalesBundle/EventListener/B2bCustomerLifetimeListener.php#L39 "Oro\Bundle\SalesBundle\EventListener\B2bCustomerLifetimeListener")</sup> method was changed to `B2bCustomerLifetimeListener::__construct(ContainerInterface $container)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/SalesBundle/EventListener/B2bCustomerLifetimeListener.php#L30 "Oro\Bundle\SalesBundle\EventListener\B2bCustomerLifetimeListener")</sup>
* The `SalesFunnel::setStartDate($startDate)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/SalesBundle/Entity/SalesFunnel.php#L219 "Oro\Bundle\SalesBundle\Entity\SalesFunnel")</sup> method was changed to `SalesFunnel::setStartDate(DateTime $startDate = null)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/SalesBundle/Entity/SalesFunnel.php#L221 "Oro\Bundle\SalesBundle\Entity\SalesFunnel")</sup>
* The `OpportunityRepository::getForecastQB(CurrencyQueryBuilderTransformerInterface $qbTransformer, $alias, $excludedStatuses = [ ... ])`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/SalesBundle/Entity/Repository/OpportunityRepository.php#L213 "Oro\Bundle\SalesBundle\Entity\Repository\OpportunityRepository")</sup> method was changed to `OpportunityRepository::getForecastQB(CurrencyQueryBuilderTransformerInterface $qbTransformer, $alias, $excludedStatuses = [ ... ])`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/SalesBundle/Entity/Repository/OpportunityRepository.php#L203 "Oro\Bundle\SalesBundle\Entity\Repository\OpportunityRepository")</sup>
* The `LeadController::disqualifyAction(Lead $lead)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/SalesBundle/Controller/LeadController.php#L147 "Oro\Bundle\SalesBundle\Controller\LeadController")</sup> method was changed to `LeadController::disqualifyAction(Lead $lead, Request $request)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/SalesBundle/Controller/LeadController.php#L159 "Oro\Bundle\SalesBundle\Controller\LeadController")</sup>
* The following methods in class `SalesFunnelController`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/SalesBundle/Controller/SalesFunnelController.php#L79 "Oro\Bundle\SalesBundle\Controller\SalesFunnelController")</sup> were changed:
  > - `createAction()`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/SalesBundle/Controller/SalesFunnelController.php#L74 "Oro\Bundle\SalesBundle\Controller\SalesFunnelController")</sup>
  > - `createAction(Request $request)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/SalesBundle/Controller/SalesFunnelController.php#L79 "Oro\Bundle\SalesBundle\Controller\SalesFunnelController")</sup>

  > - `update(SalesFunnel $entity)`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/SalesBundle/Controller/SalesFunnelController.php#L100 "Oro\Bundle\SalesBundle\Controller\SalesFunnelController")</sup>
  > - `update(SalesFunnel $entity, Request $request)`<sup>[[?]](https://github.com/oroinc/crm/tree/5.0.0/src/Oro/Bundle/SalesBundle/Controller/SalesFunnelController.php#L106 "Oro\Bundle\SalesBundle\Controller\SalesFunnelController")</sup>

* The `B2bCustomerLifetimeListener::initializeFromEventArgs`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/SalesBundle/EventListener/B2bCustomerLifetimeListener.php#L213 "Oro\Bundle\SalesBundle\EventListener\B2bCustomerLifetimeListener::initializeFromEventArgs")</sup> method was removed.
* The `CustomerAssociationListener::setEnabled`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/SalesBundle/EventListener/Customers/CustomerAssociationListener.php#L51 "Oro\Bundle\SalesBundle\EventListener\Customers\CustomerAssociationListener::setEnabled")</sup> method was removed.
* The following properties in class `B2bCustomerLifetimeListener`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/SalesBundle/EventListener/B2bCustomerLifetimeListener.php#L22 "Oro\Bundle\SalesBundle\EventListener\B2bCustomerLifetimeListener")</sup> were removed:
   - `$uow`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/SalesBundle/EventListener/B2bCustomerLifetimeListener.php#L22 "Oro\Bundle\SalesBundle\EventListener\B2bCustomerLifetimeListener::$uow")</sup>
   - `$em`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/SalesBundle/EventListener/B2bCustomerLifetimeListener.php#L25 "Oro\Bundle\SalesBundle\EventListener\B2bCustomerLifetimeListener::$em")</sup>
   - `$rateConverter`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/SalesBundle/EventListener/B2bCustomerLifetimeListener.php#L34 "Oro\Bundle\SalesBundle\EventListener\B2bCustomerLifetimeListener::$rateConverter")</sup>
* The `CustomerAssociationListener::$enabled`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/SalesBundle/EventListener/Customers/CustomerAssociationListener.php#L19 "Oro\Bundle\SalesBundle\EventListener\Customers\CustomerAssociationListener::$enabled")</sup> property was removed.
* The following properties in class `OpportunityListener`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/SalesBundle/Entity/EventListener/OpportunityListener.php#L16 "Oro\Bundle\SalesBundle\Entity\EventListener\OpportunityListener")</sup> were removed:
   - `$valuableChangesetKeys`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/SalesBundle/Entity/EventListener/OpportunityListener.php#L16 "Oro\Bundle\SalesBundle\Entity\EventListener\OpportunityListener::$valuableChangesetKeys")</sup>
   - `$currencyProvider`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/SalesBundle/Entity/EventListener/OpportunityListener.php#L30 "Oro\Bundle\SalesBundle\Entity\EventListener\OpportunityListener::$currencyProvider")</sup>

TestFrameworkCRMBundle
----------------------
* The `Configuration`<sup>[[?]](https://github.com/oroinc/crm/tree/4.2.0/src/Oro/Bundle/TestFrameworkCRMBundle/DependencyInjection/Configuration.php#L8 "Oro\Bundle\TestFrameworkCRMBundle\DependencyInjection\Configuration")</sup> class was removed.
