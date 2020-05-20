<?php

namespace App\DataFixtures;

use App\DataFixtures\Specifications\BatteryFixture;
use App\DataFixtures\Specifications\CameraFixture;
use App\DataFixtures\Specifications\DimensionFixture;
use App\DataFixtures\Specifications\DiversFixture;
use App\DataFixtures\Specifications\NetworkFixture;
use App\DataFixtures\Specifications\PerformanceFixture;
use App\DataFixtures\Specifications\ScreenFixture;
use App\DataFixtures\Specifications\StorageFixture;
use App\DataFixtures\Specifications\SystemFixture;
use App\Entity\Specification;
use App\Entity\Specifications\Battery;
use App\Entity\Specifications\Camera;
use App\Entity\Specifications\Dimension;
use App\Entity\Specifications\Divers;
use App\Entity\Specifications\Network;
use App\Entity\Specifications\Performance;
use App\Entity\Specifications\Screen;
use App\Entity\Specifications\Storage;
use App\Entity\Specifications\System;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class SpecificationFixture extends BaseFixture implements DependentFixtureInterface
{
    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Specification::class, 5, function (Specification $specification, $i) {
            $specification->setBattery($this->getReference(Battery::class . '_' . $i));
            $specification->setCamera($this->getReference(Camera::class . '_' . $i));
            $specification->setDimension($this->getReference(Dimension::class . '_' . $i));
            $specification->setDivers($this->getReference(Divers::class . '_' . $i));
            $specification->setNetwork($this->getReference(Network::class . '_' . $i));
            $specification->setPerformance($this->getReference(Performance::class . '_' . $i));
            $specification->setScreen($this->getReference(Screen::class . '_' . $i));
            $specification->setStorage($this->getReference(Storage::class . '_' . $i));
            $specification->setSystem($this->getReference(System::class . '_' . $i));
        });

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            BatteryFixture::class,
            CameraFixture::class,
            DimensionFixture::class,
            DiversFixture::class,
            NetworkFixture::class,
            PerformanceFixture::class,
            ScreenFixture::class,
            StorageFixture::class,
            SystemFixture::class,
        ];
    }
}
