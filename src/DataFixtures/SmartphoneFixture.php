<?php

namespace App\DataFixtures;

use App\Entity\Provider;
use App\Entity\Smartphone;
use App\Entity\Specification;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class SmartphoneFixture extends BaseFixture implements DependentFixtureInterface
{
    private static $smartphones = [
        [
            'title' => 'Samsung Galaxy A80',
            'content' => 'Le Samsung Galaxy A80 est un smartphone de milieu de gamme annoncé le 10 avril 2019. Il est équipé d\'un écran Super AMOLED de 6,7 pouces avec une définition Full HD+ avec un slider qui permet d\'utiliser son triple-capteur dorsal en mode selfie.',
            'rate' => '8/10',
            'price' => 479,
        ],
        [
            'title' => 'Xiaomi Mi 9',
            'content' => 'Le Xiaomi Mi 9 est un smartphone haut de gamme annoncé par Xiaomi le 24 février 2019. Il est équipé d\'un SoC Snapdragon 855, d\'un triple capteur photo, d\'un écran AMOLED de 6,39 pouces et d\'une batterie de 3500 mAh compatible Qi.',
            'rate' => '9/10',
            'price' => 419,
        ],
        [
            'title' => 'Honor 20',
            'content' => 'Le Honor 20 est le flagship 2019 de Honor. Il est équipé d\'un quadruple capteur photo et du SoC Kirin 980, son écran IPS LCD est de 6,26 pouces en Full HD+. Il est équipé de l\'interface Magic UI sous Android Pie.',
            'rate' => '8/10',
            'price' => 299,
        ],
        [
            'title' => 'OnePlus 7T',
            'content' => 'Le OnePlus 7T est le successeur du OnePlus 7. Evolution de ce dernier, il est équipé d\'un SoC Qualcomm Snapdragon 855+ et une nouvelle solution pour la photo avec un triple capteur arrière de 48+12+16 mégapixels.',
            'rate' => '8/10',
            'price' => 457,
        ],
        [
            'title' => 'Apple iPhone SE 2020',
            'content' => 'L\'iPhone SE (2020) est un smartphone de milieu de gamme annoncé le 15 avril 2020. Il représente l\'entrée de gamme de la marque à la pomme sur l\'année 2020 à côté des iPhone 11. Considéré comme l\'héritier de l\'iPhone 8, il reprend le célèbre formfactor de la série avant l\'arrivée de FaceID avec un écran compact de 4,7 pouces avec des bordures importantes et un unique bouton central également utilisé pour Touch ID. Il est équipé d\'un SoC Apple A13 Bionic qui le rend aussi performant qu\'un iPhone 11 et d\'un simple capteur photo de 12 mégapixels à l\'arrière.',
            'rate' => '9/10',
            'price' => 1230,
        ],
    ];
    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Smartphone::class, 20, function (Smartphone $smartphone, $i) {
            $randomNumber = random_int(0, 4);
            $smartphone->setTitle(self::$smartphones[$randomNumber]['title']);
            $smartphone->setContent(self::$smartphones[$randomNumber]['content']);
            $smartphone->setRate(self::$smartphones[$randomNumber]['rate']);
            $smartphone->setPrice(self::$smartphones[$randomNumber]['price']);

            $smartphone->setProvider($this->getReference(Provider::class . '_' . $randomNumber));
            $smartphone->setSpecification($this->getReference(Specification::class . '_' . $randomNumber));
        });

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SpecificationFixture::class,
            ProviderFixture::class
        ];
    }
}
