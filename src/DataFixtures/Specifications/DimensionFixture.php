<?php

namespace App\DataFixtures\Specifications;

use App\DataFixtures\BaseFixture;
use App\Entity\Specifications\Dimension;
use Doctrine\Common\Persistence\ObjectManager;

class DimensionFixture extends BaseFixture
{
    private static $dimension = [
        [
            'weight' => '183 grammes',
            'thickness' => '7,7 mm',
            'width' => '73 mm',
            'length' => '164.6 mm'
        ],
        [
            'weight' => '168 grammes',
            'thickness' => '7,4 mm',
            'width' => '63 mm',
            'length' => '154.6 mm'
        ],
        [
            'weight' => '192 grammes',
            'thickness' => '8,3 mm',
            'width' => '72 mm',
            'length' => '151.6 mm'
        ],
        [
            'weight' => '151 grammes',
            'thickness' => '5,7 mm',
            'width' => '65 mm',
            'length' => '173.9 mm'
        ],
        [
            'weight' => '197 grammes',
            'thickness' => '7,5 mm',
            'width' => '61 mm',
            'length' => '199.1 mm'
        ],

    ];

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Dimension::class, 5, function (Dimension $dimension, $i) {
            $dimension->setWeight(self::$dimension[$i]['weight']);
            $dimension->setThickness(self::$dimension[$i]['thickness']);
            $dimension->setWidth(self::$dimension[$i]['width']);
            $dimension->setLength(self::$dimension[$i]['length']);
        });

        $manager->flush();
    }
}
