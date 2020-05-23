<?php

namespace App\Tests\Behat;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

require_once __DIR__.'/../../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php';

/**
 * Defines application features from the specific context.
 */
final class UserContext implements Context
{
    /**
     * @var KernelInterface.
     */
    protected $kernel;

    /**
     * @var Response|null
     */
    protected $response;

    /** @var EntityManagerInterface */
    protected $entityManager;
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(KernelInterface $kernel, EntityManagerInterface $entityManager)
    {
        $this->kernel = $kernel;
        $this->entityManager = $entityManager;
    }

    /**
     * @When I request :arg1
     */
    public function iRequest($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then the response status code should be :arg1
     */
    public function theResponseStatusCodeShouldBe($arg1)
    {
        $response = $this->getResponse();
        $contentType = $response->getHeader('Content-Type');

        // looks for application/json or something like application/problem+json
        if (preg_match('#application\/(.)*\+?json#', $contentType)) {
            $bodyOutput = $response->getBody();
        } else {
            $bodyOutput = 'Output is "'.$contentType.'", which is not JSON and is therefore scary. Run the request manually.';
        }
        assertSame((int) $statusCode, (int) $this->getResponse()->getStatusCode(), $bodyOutput);
    }

    /**
     * @Then the following properties should exist:
     */
    public function theFollowingPropertiesShouldExist(PyStringNode $string)
    {
        throw new PendingException();
    }

    /**
     * @Given I am on :arg1
     */
    public function iAmOn($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given the following user exist:
     */
    public function theFollowingUserExist(TableNode $table)
    {
        throw new PendingException();
    }

    /**
     * @Then the :arg1 header should be :arg2
     */
    public function theHeaderShouldBe($arg1, $arg2)
    {
        $response = $this->getResponse();
        assertEquals($expectedHeaderValue, (string) $response->getHeader($headerName));
    }

    /**
     * @Then the :arg1 property should equal :arg2
     */
    public function thePropertyShouldEqual($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Given I have the payload:
     */
    public function iHaveThePayload(PyStringNode $string)
    {
        throw new PendingException();
    }

    /**
     * @Then the :arg1 property should exist
     */
    public function thePropertyShouldExist($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then the :arg1 property should not exist
     */
    public function thePropertyShouldNotExist($arg1)
    {
        throw new PendingException();
    }
}
