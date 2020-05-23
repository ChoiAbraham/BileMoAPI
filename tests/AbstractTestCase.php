<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AbstractWebTestCase extends ApiTestCase
{
    use FixturesTrait;

    /** @var KernelBrowser */
    protected $client;

    /** @var EntityManagerInterface */
    protected $entityManager;

    /** @var ContainerInterface */
    protected $containerService;

    protected function setUp()
    {
        $this->client = self::createClient();

        $this->containerService = self::$container;
        $this->entityManager = $this->containerService->get('doctrine')->getManager();

//        $this->entityManager = $this->containerService->get('doctrine.orm.default_entity_manager');

        $schemaTool = new SchemaTool($this->entityManager);
        $schemaTool->dropSchema($this->entityManager->getMetadataFactory()->getAllMetadata());
        $schemaTool->createSchema($this->entityManager->getMetadataFactory()->getAllMetadata());
    }

    /**
     * @param string|null $method
     * @param string|null $url
     * @param string $bodyRequest
     * @return Response
     */
    protected function request(string $method, string $url, $identifier = null, $password = null, string $bodyRequest = null)
    {
        $this->client->request($method, $url, [], [], ['CONTENT_TYPE' => 'application/json'], $bodyRequest);
        return $this->client->getResponse();
    }
}
