<?php

namespace Oro\Bundle\EmailBundle\EventListener;

use Doctrine\Common\Util\ClassUtils;
use Doctrine\ORM\EntityManager;
use Oro\Bundle\ActivityListBundle\Provider\ActivityListChainProvider;
use Oro\Bundle\AttachmentBundle\EntityConfig\AttachmentScope;
use Oro\Bundle\EmailBundle\Event\EmailBodyAdded;
use Oro\Bundle\EmailBundle\Manager\EmailAttachmentManager;
use Oro\Bundle\EmailBundle\Provider\EmailActivityListProvider;
use Oro\Bundle\EntityConfigBundle\Provider\ConfigProvider;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * The event listener class the act after adding email body that updating activity description
 * and adding attachment to the Email target entities
 */
class EmailBodyAddListener
{
    private const LINK_ATTACHMENT_CONFIG_OPTION = 'auto_link_attachments';

    /** @var ConfigProvider */
    protected $configProvider;

    /** @var EmailAttachmentManager */
    protected $attachmentManager;

    /** @var EmailActivityListProvider */
    protected $activityListProvider;

    /** @var AuthorizationCheckerInterface */
    protected $authorizationChecker;

    /** @var TokenStorageInterface */
    protected $tokenStorage;

    /** @var ActivityListChainProvider */
    protected $chainProvider;

    /** @var EntityManager */
    protected $entityManager;

    public function __construct(
        EmailAttachmentManager $attachmentManager,
        ConfigProvider $configProvider,
        EmailActivityListProvider $activityListProvider,
        AuthorizationCheckerInterface $authorizationChecker,
        TokenStorageInterface $tokenStorage,
        ActivityListChainProvider $chainProvider,
        EntityManager $entityManager
    ) {
        $this->attachmentManager = $attachmentManager;
        $this->configProvider = $configProvider;
        $this->activityListProvider = $activityListProvider;
        $this->authorizationChecker = $authorizationChecker;
        $this->tokenStorage = $tokenStorage;
        $this->chainProvider = $chainProvider;
        $this->entityManager = $entityManager;
    }

    public function linkToScope(EmailBodyAdded $event)
    {
        if (null !== $this->tokenStorage->getToken()
            && !$this->authorizationChecker->isGranted('CREATE', 'entity:' . AttachmentScope::ATTACHMENT)
        ) {
            return;
        }

        $email = $event->getEmail();
        $entities = $this->activityListProvider->getTargetEntities($email);
        foreach ($entities as $entity) {
            if ((bool)$this->configProvider->getConfig(ClassUtils::getClass($entity))
                ->get(self::LINK_ATTACHMENT_CONFIG_OPTION)) {
                foreach ($email->getEmailBody()->getAttachments() as $attachment) {
                    $this->attachmentManager->linkEmailAttachmentToTargetEntity($attachment, $entity);
                }
            }
        }
    }

    /**
     * @throws \Exception
     */
    public function updateActivityDescription(EmailBodyAdded $event)
    {
        $this->entityManager->beginTransaction();
        try {
            $email = $event->getEmail();
            $activityList = $this->chainProvider->getUpdatedActivityList($email, $this->entityManager);
            if ($activityList) {
                $this->entityManager->persist($activityList);
                $this->entityManager->flush();
            }
            $this->entityManager->commit();
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            throw $e;
        }
    }
}
