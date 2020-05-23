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
final class PhoneContext implements Context
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
     * @Given the following smartphone exist:
     */
    public function theFollowingSmartphoneExist(TableNode $table)
    {
        throw new PendingException();
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
        throw new PendingException();
    }

    /**
     * @Then the following properties should exist:
     */
    public function theFollowingPropertiesShouldExist(PyStringNode $string)
    {
        throw new PendingException();
    }

    /**
     * @Given the following smartphones exist:
     */
    public function theFollowingSmartphonesExist(TableNode $table)
    {
        throw new PendingException();
    }

    /**
     * @Then the :arg1 property should be an array
     */
    public function thePropertyShouldBeAnArray($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then the :arg1 property should contain :arg2 items
     */
    public function thePropertyShouldContainItems($arg1, $arg2)
    {
        throw new PendingException();
    }
}
