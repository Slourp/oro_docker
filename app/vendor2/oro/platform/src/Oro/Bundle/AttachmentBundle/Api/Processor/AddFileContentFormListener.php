<?php

namespace Oro\Bundle\AttachmentBundle\Api\Processor;

use Oro\Bundle\ApiBundle\Form\FormUtil;
use Oro\Bundle\ApiBundle\Processor\FormContext;
use Oro\Bundle\AttachmentBundle\Manager\FileManager;
use Oro\Component\ChainProcessor\ContextInterface;
use Oro\Component\ChainProcessor\ProcessorInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Adds event listener for File entity form to process a file content.
 */
class AddFileContentFormListener implements ProcessorInterface
{
    private const CONTENT_FIELD_NAME = 'content';
    private const ORIGINAL_FILE_NAME_FIELD_NAME = 'originalFilename';
    private const MIME_TYPE_FIELD_NAME = 'mimeType';

    private FileManager $fileManager;

    public function __construct(FileManager $fileManager)
    {
        $this->fileManager = $fileManager;
    }

    /**
     * {@inheritdoc}
     */
    public function process(ContextInterface $context): void
    {
        /** @var FormContext $context */

        $formBuilder = $context->getFormBuilder();
        if (!$formBuilder) {
            // the form builder does not exist
            return;
        }

        $formBuilder->addEventListener(FormEvents::PRE_SUBMIT, [$this, 'onPreSubmit']);
    }

    public function onPreSubmit(FormEvent $event): void
    {
        $data = $event->getData();
        if (!$data || !\array_key_exists(self::CONTENT_FIELD_NAME, $data)) {
            return;
        }

        if (!\array_key_exists(self::ORIGINAL_FILE_NAME_FIELD_NAME, $data)) {
            FormUtil::addFormError(
                $event->getForm(),
                sprintf(
                    'The "%s" field should be specified together with "%s" field.',
                    self::CONTENT_FIELD_NAME,
                    self::ORIGINAL_FILE_NAME_FIELD_NAME
                )
            );
            $data[self::CONTENT_FIELD_NAME] = null;
            $event->setData($data);

            return;
        }

        $content = $data[self::CONTENT_FIELD_NAME];
        if (null === $content) {
            return;
        }

        $decodedContent = base64_decode($content, true);
        if (false === $decodedContent) {
            FormUtil::addFormError($event->getForm(), 'Cannot decode content encoded with MIME base64.');
            $data[self::CONTENT_FIELD_NAME] = null;
        } else {
            $file = $this->fileManager->writeToTemporaryFile(
                $decodedContent,
                $data[self::ORIGINAL_FILE_NAME_FIELD_NAME]
            );
            if (!empty($data[self::MIME_TYPE_FIELD_NAME])) {
                $file = new UploadedFile(
                    $file->getPathname(),
                    $data[self::ORIGINAL_FILE_NAME_FIELD_NAME],
                    $data[self::MIME_TYPE_FIELD_NAME]
                );
            }
            $data[self::CONTENT_FIELD_NAME] = $file;
        }

        $event->setData($data);
    }
}
