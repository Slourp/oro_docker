<?php

namespace Oro\Bundle\EmailBundle\Controller\Api\Rest;

use Doctrine\ORM\Proxy\Proxy;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Oro\Bundle\SoapBundle\Controller\Api\Rest\RestGetController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * REST API controller to get entities associated with an email activity.
 */
class EmailActivityEntityController extends RestGetController
{
    /**
     * Get entities associated with the email activity.
     *
     * @param int $id The id of the email entity.
     *
     * @QueryParam(
     *      name="page",
     *      requirements="\d+",
     *      nullable=true,
     *      description="Page number, starting from 1. Defaults to 1."
     * )
     * @QueryParam(
     *      name="limit",
     *      requirements="\d+",
     *      nullable=true,
     *      description="Number of items per page. Defaults to 10."
     * )
     *
     * @ApiDoc(
     *      description="Get entities associated with the email activity",
     *      resource=true
     * )
     * @param Request $request
     * @return Response
     */
    public function cgetAction(Request $request, $id)
    {
        $page  = (int)$request->get('page', 1);
        $limit = (int)$request->get('limit', self::ITEMS_PER_PAGE);

        $criteria = $this->buildFilterCriteria(['id' => ['=', $id]]);

        return $this->handleGetListRequest($page, $limit, $criteria);
    }

    /**
     * {@inheritdoc}
     */
    public function getManager()
    {
        return $this->container->get('oro_email.manager.email_activity_entity.api');
    }

    /**
     * {@inheritdoc}
     */
    protected function getPreparedItem($entity, $resultFields = [])
    {
        if ($entity instanceof Proxy && !$entity->__isInitialized()) {
            $entity->__load();
        }
        $result = parent::getPreparedItem($entity, $resultFields);
        if ($entity && is_array($entity)) {
            $result = $this->addRouteView($result);
        }

        return $result;
    }

    /**
     * @param $result
     * @return mixed
     */
    protected function addRouteView($result)
    {
        $metadata = $this->get('oro_entity_config.config_manager')->getEntityMetadata($result['entity']);
        if ($metadata && $metadata->hasRoute()) {
            $result['urlView'] =
                $this->get('router')->generate($metadata->getRoute(), ['id' => $result['id']]);
        } else {
            $result['urlView'] = '';
        }

        return $result;
    }
}
