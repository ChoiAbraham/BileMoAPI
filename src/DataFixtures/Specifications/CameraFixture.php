<?php

namespace App\DataFixtures\Specifications;

use App\DataFixtures\BaseFixture;
use App\Entity\Specifications\Camera;
use Doctrine\Common\Persistence\ObjectManager;

class CameraFixture extends BaseFixture
{
    private static $camera = [
        [
            'camera' => '64 Mpx, 5 Mpx, 12 Mpx, 5 Mpx',
            'flashFront' => false,
            'flashBack' => true,
            'sensorNumber' => 5,
            'sensorFrontPixels' => '32 Mpx'
        ],
        [
            'camera' => '48 Mpx, 13 Mpx, 8 Mpx',
            'flashFront' => false,
            'flashBack' => true,
            'sensorNumber' => 4,
            'sensorFrontPixels' => '20 Mpx'
        ],
        [
            'camera' => '64 Mpx, 5 Mpx, 12 Mpx, 5 Mpx',
            'flashFront' => false,
            'flashBack' => true,
            'sensorNumber' => 2,
            'sensorFrontPixels' => '40 Mpx'
        ],
        [
            'camera' => '64 Mpx, 5 Mpx, 12 Mpx, 5 Mpx',
            'flashFront' => false,
            'flashBack' => true,
            'sensorNumber' => 3,
            'sensorFrontPixels' => '45 Mpx'
        ],
        [
            'camera' => '64 Mpx, 5 Mpx, 12 Mpx, 5 Mpx',
            'flashFront' => true,
            'flashBack' => false,
            'sensorNumber' => 8,
            'sensorFrontPixels' => '38 Mpx'
        ],
    ];

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Camera::class, 5, function (Camera $camera, $i) {
            $camera->setCamera(self::$camera[$i]['camera']);
            $camera->setFlashBack(self::$camera[$i]['flashFront']);
            $camera->setFlashFront(self::$camera[$i]['flashBack']);
            $camera->setSensorNumber(self::$camera[$i]['sensorNumber']);
            $camera->setSensorFrontPixels(self::$camera[$i]['sensorFrontPixels']);
        });

        $manager->flush();
    }
}
