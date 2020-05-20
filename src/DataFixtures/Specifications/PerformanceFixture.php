<?php

namespace App\DataFixtures\Specifications;

use App\DataFixtures\BaseFixture;
use App\Entity\Specifications\Performance;
use Doctrine\Common\Persistence\ObjectManager;

class PerformanceFixture extends BaseFixture
{
    private static $performance = [
        [
            'processor' => 'Snapdragon 730',
            'ram' => '6 Go, 8 Go',
            'fabriquant' => 'Qualcomm',
            'gpu' => 'Qualcomm Adreno 519',
            'frequence' => '2.2 GHz',
            'cpu' => 'Octa-Core',
        ],
        [
            'processor' => 'Snapdragon 730',
            'ram' => '6 Go, 8 Go',
            'fabriquant' => 'Qualcomm',
            'gpu' => 'Qualcomm Adreno 519',
            'frequence' => '2.2 GHz',
            'cpu' => 'Octa-Core',
        ],
        [
            'processor' => 'Snapdragon 730',
            'ram' => '6 Go, 8 Go',
            'fabriquant' => 'Qualcomm',
            'gpu' => 'Qualcomm Adreno 519',
            'frequence' => '2.2 GHz',
            'cpu' => 'Octa-Core',
        ],
        [
            'processor' => 'Snapdragon 730',
            'ram' => '6 Go, 8 Go',
            'fabriquant' => 'Qualcomm',
            'gpu' => 'Qualcomm Adreno 519',
            'frequence' => '2.2 GHz',
            'cpu' => 'Octa-Core',
        ],
        [
            'processor' => 'Snapdragon 730',
            'ram' => '6 Go, 8 Go',
            'fabriquant' => 'Qualcomm',
            'gpu' => 'Qualcomm Adreno 519',
            'frequence' => '2.2 GHz',
            'cpu' => 'Octa-Core',
        ],
    ];

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Performance::class, 5, function (Performance $performance, $i) {
            $performance->setProcessor(self::$performance[$i]['processor']);
            $performance->setRam(self::$performance[$i]['ram']);
            $performance->setFabriquant(self::$performance[$i]['fabriquant']);
            $performance->setGpu(self::$performance[$i]['gpu']);
            $performance->setFrequence(self::$performance[$i]['frequence']);
            $performance->setCPU(self::$performance[$i]['cpu']);
        });

        $manager->flush();
    }
}
