<?php

namespace App\Tests\Behat;

use Behat\Behat\Context\Context;

final class WebContext implements Context
{
    /**
     * @Then the application's kernel should use :expected environment
     */
    public function kernelEnvironmentShouldBe(string $expected): void
    {
    }
}