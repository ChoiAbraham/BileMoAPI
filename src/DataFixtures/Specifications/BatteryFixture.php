<?php

namespace App\DataFixtures\Specifications;

use App\DataFixtures\BaseFixture;
use App\Entity\Specifications\Battery;
use Doctrine\Common\Persistence\ObjectManager;

class BatteryFixture extends BaseFixture
{
    private static $battery = [
        [
            'capacity' => '4500 mAh',
            'power' => '25 watts',
            'technology' => 'Li-Po',
            'withoutCable' => false,
            'removable' => false,
        ],
        [
            'capacity' => '4000 mAh',
            'power' => '30 watts',
            'technology' => 'Li-Po',
            'withoutCable' => false,
            'removable' => false,
        ],
        [
            'capacity' => '3500 mAh',
            'power' => '40 watts',
            'technology' => 'Li-Po',
            'withoutCable' => false,
            'removable' => true,
        ],
        [
            'capacity' => '4200 mAh',
            'power' => '20 watts',
            'technology' => 'Li-Po',
            'withoutCable' => false,
            'removable' => true,
        ],
        [
            'capacity' => '5000 mAh',
            'power' => '25 watts',
            'technology' => 'Li-Po',
            'withoutCable' => false,
            'removable' => false,
        ],
    ];

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Battery::class, 5, function (Battery $battery, $i) {
            $battery->setCapacity(self::$battery[$i]['capacity']);
            $battery->setPower(self::$battery[$i]['power']);
            $battery->setTechnology(self::$battery[$i]['technology']);
            $battery->setWithoutCable(self::$battery[$i]['withoutCable']);
            $battery->setRemovable(self::$battery[$i]['removable']);
        });

        $manager->flush();
    }
}
