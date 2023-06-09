<?php

namespace Oro\Bundle\SalesBundle\Tests\Functional\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Persistence\ObjectManager;
use Oro\Bundle\OrganizationBundle\Entity\Organization;
use Oro\Bundle\SalesBundle\Entity\B2bCustomer;
use Oro\Bundle\UserBundle\Entity\User;

class LoadB2bCustomerEntitiesData extends AbstractFixture
{
    const FIRST_ENTITY_NAME  = 'Life Plan Councelling';
    const SECOND_ENTITY_NAME = 'Big D Supermarkets';
    const THIRD_ENTITY_NAME  = 'Cherry Webb';
    const FOURTH_ENTITY_NAME = 'National Lumber';

    public static $owner = 'admin';

    /**
     * @var array
     */
    protected $b2bCustomersData = [
        self::FIRST_ENTITY_NAME,
        self::SECOND_ENTITY_NAME,
        self::THIRD_ENTITY_NAME,
        self::FOURTH_ENTITY_NAME
    ];

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $user = $manager->getRepository(User::class)->findOneByUsername(self::$owner);
        $organization = $manager->getRepository(Organization::class)->getFirst();

        foreach ($this->b2bCustomersData as $customerName) {
            $contact = new B2bCustomer();
            $contact->setOwner($user);
            $contact->setOrganization($organization);
            $contact->setName($customerName);
            $this->setReference('B2bCustomer_' . $customerName, $contact);
            $manager->persist($contact);
        }

        $manager->flush();
    }
}
