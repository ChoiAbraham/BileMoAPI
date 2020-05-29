<?php

namespace App\DataFixtures\Specifications;

use App\DataFixtures\BaseFixture;
use App\Entity\Specifications\Screen;
use Doctrine\Common\Persistence\ObjectManager;

class ScreenFixture extends BaseFixture
{
    private static $screen = [
        [
            'size' => '6.7 pouces',
            'definition' => '2400 x 1080 pixels',
            'dpi' => '393 ppp'
        ],
        [
            'size' => '6.7 pouces',
            'definition' => '2400 x 1080 pixels',
            'dpi' => '393 ppp'
        ],
        [
            'size' => '6.7 pouces',
            'definition' => '2400 x 1080 pixels',
            'dpi' => '393 ppp'
        ],
        [
            'size' => '6.7 pouces',
            'definition' => '2400 x 1080 pixels',
            'dpi' => '393 ppp'
        ],
        [
            'size' => '6.7 pouces',
            'definition' => '2400 x 1080 pixels',
            'dpi' => '393 ppp'
        ],
    ];

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Screen::class, 5, function (Screen $screen, $i) {
            $screen->setSize(self::$screen[$i]['size']);
            $screen->setDefinition(self::$screen[$i]['definition']);
            $screen->setDpi(self::$screen[$i]['dpi']);
        });

        $manager->flush();
    }
}
