<?php

namespace App\DataFixtures\Specifications;

use App\DataFixtures\BaseFixture;
use App\Entity\Specifications\System;
use Doctrine\Common\Persistence\ObjectManager;

class SystemFixture extends BaseFixture
{
    private static $system = [
        [
            'operatingSystem' => 'Android 10 Q',
            'interface' => 'Samsung One UI',
        ],
        [
            'operatingSystem' => 'Android 9.0',
            'interface' => 'MIUI',
        ],
        [
            'operatingSystem' => 'Android 10 Q',
            'interface' => 'HONOR',
        ],
        [
            'operatingSystem' => 'Android 9.0',
            'interface' => 'ONEPLUS',
        ],
        [
            'operatingSystem' => 'Android 10 Q',
            'interface' => 'Samsung',
        ],
    ];

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(System::class, 5, function (System $system, $i) {
            $system->setOperatingSystem(self::$system[$i]['operatingSystem']);
            $system->setInterface(self::$system[$i]['interface']);
        });

        $manager->flush();
    }
}
