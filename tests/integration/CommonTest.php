<?php
namespace Mattwellss\Doctrine_Bundle\Config;
require __DIR__ . '/Dummy/mapping/Entity.php';

use Aura\Di\ContainerBuilder;

class CommonTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $builder = new ContainerBuilder;
        $this->di = $builder->newConfiguredInstance([
            'Mattwellss\Doctrine_Bundle\Config\Common',
            'Mattwellss\Dummy\Config\Common'
        ]);

        /**
         * @var \Doctrine\ORM\EntityManager
         */
        $entityManager = $this->di->get('doctrine/orm:entity-manager');

        // Generate the schema
        $schemaTool = new \Doctrine\ORM\Tools\SchemaTool($entityManager);
        $schemaTool->createSchema(
            $entityManager->getMetadataFactory()->getAllMetadata());
    }

    public function testEntityManagerGet()
    {
        /**
         * @var Doctrine\ORM\EntityManager
         */
        $entityManager = $this->di->get('doctrine/orm:entity-manager');


        $this->assertInstanceOf(
            \Doctrine\ORM\EntityManager::class, $entityManager);
    }

    public function testPersistence()
    {
        /**
         * @var Doctrine\ORM\EntityManager
         */
        $entityManager = $this->di->get('doctrine/orm:entity-manager');

        $entity = new \Entity('Matt');

        $entityManager->persist($entity);
        $entityManager->flush();

        $entityRepo = $entityManager->getRepository('Entity');

        $results = $entityRepo->findAll();

        $this->assertCount(1, $results);
    }
}
