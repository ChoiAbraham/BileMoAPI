<?php

namespace App\DataFixtures\Specifications;

use App\DataFixtures\BaseFixture;
use App\Entity\Specifications\Network;
use Doctrine\Common\Persistence\ObjectManager;

class NetworkFixture extends BaseFixture
{
    private static $network = [
        [
            'wifi' => 'Wi-Fi 5 (ac)',
            'bluetooth' => '5.0',
            'nfc' => true,
            'usbVersion' => '2.0',
            'gps' => true,
            'gyroscope' => true,
            'fingerPrintSensor' => true,
        ],
        [
            'wifi' => 'Wi-Fi 5 (ac)',
            'bluetooth' => '5.0',
            'nfc' => true,
            'usbVersion' => '2.0',
            'gps' => true,
            'gyroscope' => true,
            'fingerPrintSensor' => true,
        ],
        [
            'wifi' => 'Wi-Fi 5 (ac)',
            'bluetooth' => '5.0',
            'nfc' => true,
            'usbVersion' => '2.0',
            'gps' => true,
            'gyroscope' => true,
            'fingerPrintSensor' => true,
        ],
        [
            'wifi' => 'Wi-Fi 5 (ac)',
            'bluetooth' => '5.0',
            'nfc' => true,
            'usbVersion' => '2.0',
            'gps' => true,
            'gyroscope' => true,
            'fingerPrintSensor' => true,
        ],
        [
            'wifi' => 'Wi-Fi 5 (ac)',
            'bluetooth' => '5.0',
            'nfc' => true,
            'usbVersion' => '2.0',
            'gps' => true,
            'gyroscope' => true,
            'fingerPrintSensor' => true,
        ],
    ];

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Network::class, 5, function (Network $network, $i) {
            $network->setWifi(self::$network[$i]['wifi']);
            $network->setBluetooth(self::$network[$i]['bluetooth']);
            $network->setNfc(self::$network[$i]['nfc']);
            $network->setUsbVersion(self::$network[$i]['usbVersion']);
            $network->setGps(self::$network[$i]['gps']);
            $network->setGyroscope(self::$network[$i]['gyroscope']);
            $network->setFingerprintSensor(self::$network[$i]['fingerPrintSensor']);
        });

        $manager->flush();
    }
}
