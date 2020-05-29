<?php

namespace App\DataFixtures\Specifications;

use App\DataFixtures\BaseFixture;
use App\Entity\Specifications\Storage;
use Doctrine\Common\Persistence\ObjectManager;

class StorageFixture extends BaseFixture
{
    private static $storage = [
        [
            'memory' => '128 Go, 64 Go',
            'extensible' => 'microSD',
            'maximum' => '1024 Go',
        ],
        [
            'memory' => '128 Go',
            'extensible' => 'microSD',
            'maximum' => '1024 Go',
        ],
        [
            'memory' => '128 Go, 64 Go',
            'extensible' => 'microSD',
            'maximum' => '1024 Go',
        ],
        [
            'memory' => '128 Go, 64 Go',
            'extensible' => 'microSD',
            'maximum' => '1024 Go',
        ],
        [
            'memory' => '128 Go, 64 Go',
            'extensible' => 'microSD',
            'maximum' => '1024 Go',
        ],
    ];

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Storage::class, 5, function (Storage $storage, $i) {
            $storage->setMemory(self::$storage[$i]['memory']);
            $storage->setExtensible(self::$storage[$i]['extensible']);
            $storage->setMaximum(self::$storage[$i]['maximum']);
        });

        $manager->flush();
    }
}
