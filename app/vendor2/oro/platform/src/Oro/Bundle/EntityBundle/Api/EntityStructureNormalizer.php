<?php

namespace Oro\Bundle\EntityBundle\Api;

use Oro\Bundle\ApiBundle\Config\EntityDefinitionConfig;
use Oro\Bundle\EntityBundle\Model\EntityFieldStructure;
use Oro\Bundle\EntityBundle\Model\EntityStructure;

/**
 * Converts an EntityStructure object to an array.
 */
class EntityStructureNormalizer
{
    public function normalize(EntityStructure $entity, EntityDefinitionConfig $config): array
    {
        return [
            'id'          => $entity->getId(),
            'label'       => $entity->getLabel(),
            'pluralLabel' => $entity->getPluralLabel(),
            'alias'       => $entity->getAlias(),
            'pluralAlias' => $entity->getPluralAlias(),
            'className'   => $entity->getClassName(),
            'icon'        => $entity->getIcon(),
            'fields'      => $this->normalizeFields(
                $entity->getFields(),
                $config->getField('fields')->getTargetEntity()
            ),
            'options'     => $entity->getOptions(),
            'routes'      => $entity->getRoutes()
        ];
    }

    /**
     * @param EntityFieldStructure[] $fields
     * @param EntityDefinitionConfig $config
     *
     * @return array
     */
    private function normalizeFields(array $fields, EntityDefinitionConfig $config): array
    {
        $result = [];
        foreach ($fields as $field) {
            $result[] = [
                'name'              => $field->getName(),
                'label'             => $field->getLabel(),
                'type'              => $field->getType(),
                'relationType'      => $field->getRelationType(),
                'relatedEntityName' => $field->getRelatedEntityName(),
                'options'           => $field->getOptions()
            ];
        }

        return $result;
    }
}
