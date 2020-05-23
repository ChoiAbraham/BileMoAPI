<?php

namespace App\Tests\Actions;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\DataFixtures\ClientFixture;
use App\DataFixtures\ProviderFixture;
use App\DataFixtures\SmartphoneFixture;
use App\DataFixtures\SpecificationFixture;
use App\DataFixtures\Specifications\BatteryFixture;
use App\DataFixtures\Specifications\CameraFixture;
use App\DataFixtures\Specifications\DimensionFixture;
use App\DataFixtures\Specifications\DiversFixture;
use App\DataFixtures\Specifications\NetworkFixture;
use App\DataFixtures\Specifications\PerformanceFixture;
use App\DataFixtures\Specifications\ScreenFixture;
use App\DataFixtures\Specifications\StorageFixture;
use App\DataFixtures\Specifications\SystemFixture;
use App\Tests\AbstractWebTestCase;
use Liip\TestFixturesBundle\Test\FixturesTrait;

class GetListOfSmartphonesActionTest extends AbstractWebTestCase
{
    use FixturesTrait;

    public function testGETSmartphonesCollectionPaginated()
    {
        // Load Fixtures
        $this->loadFixtures([
            BatteryFixture::class,
            CameraFixture::class,
            DimensionFixture::class,
            DiversFixture::class,
            NetworkFixture::class,
            PerformanceFixture::class,
            ScreenFixture::class,
            StorageFixture::class,
            SystemFixture::class,
            SpecificationFixture::class,
            ProviderFixture::class,
            SmartphoneFixture::class,
            ClientFixture::class,
        ]);

        $response = $this->client->request('GET', '/api/phones');
        $this->assertEquals(200, $response->getStatusCode());
    }
}
