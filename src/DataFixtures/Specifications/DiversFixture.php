<?php

namespace App\DataFixtures\Specifications;

use App\DataFixtures\BaseFixture;
use App\Entity\Specifications\Divers;
use Doctrine\Common\Persistence\ObjectManager;

class DiversFixture extends BaseFixture
{
    private static $divers = [
        [
            'family' => 'Galaxy A',
            'color' => 'Noir, Blanc, Vert, Rose',
            'appareance' => 'Verre',
        ],
        [
            'family' => 'Xiaomi Redmi',
            'color' => 'Noir, Rouge, Bleu',
            'appareance' => 'Plastique',
        ],
        [
            'family' => 'Galaxy A',
            'color' => 'Noir, Blanc, Vert, Rose',
            'appareance' => 'verre',
        ],
        [
            'family' => 'Galaxy A',
            'color' => 'Noir, Blanc, Vert, Rose',
            'appareance' => 'verre',
        ],
        [
            'family' => 'Galaxy A',
            'color' => 'Noir, Blanc, Vert, Rose',
            'appareance' => 'verre',
        ],
    ];

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Divers::class, 5, function (Divers $divers, $i) {
            $divers->setFamily(self::$divers[$i]['family']);
            $divers->setColor(self::$divers[$i]['color']);
            $divers->setAppearance(self::$divers[$i]['appareance']);
            $divers->setReleaseDate(new \DateTime(19 / 12 / 2019));
        });

        $manager->flush();
    }
}
