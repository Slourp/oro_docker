<?php

namespace Oro\Bundle\UserBundle\Tests\Functional\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Persistence\ObjectManager;
use Oro\Bundle\OrganizationBundle\Entity\BusinessUnit;
use Oro\Bundle\OrganizationBundle\Entity\Organization;

class LoadBusinessUnitData extends AbstractFixture
{
    const BUSINESS_UNIT_1 = 'business_unit_1';
    const BUSINESS_UNIT_2 = 'business_unit_2';

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $organization = $manager->getRepository(Organization::class)->getFirst();
        $businessUnits = [self::BUSINESS_UNIT_1, self::BUSINESS_UNIT_2];
        foreach ($businessUnits as $businessUnitName) {
            $businessUnit = new BusinessUnit();
            $businessUnit->setName($businessUnitName);
            $businessUnit->setOrganization($organization);
            $manager->persist($businessUnit);
            $manager->flush();
            $this->setReference($businessUnitName, $businessUnit);
        }
    }
}
