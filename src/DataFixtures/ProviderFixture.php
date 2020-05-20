<?php

namespace App\DataFixtures;

use App\Entity\Provider;
use Doctrine\Common\Persistence\ObjectManager;

class ProviderFixture extends BaseFixture
{
    private static $provider = [
        [
            'companyName' => 'Samsung',
            'address' => 'Seoul Mapo-gu',
            'country' => 'Korea',
            'telephone' => '+01 028 382 103',
            'email' => 'samsung.provider@samsung.com'
        ],
        [
            'companyName' => 'Xiaomi',
            'address' => 'Beijing 72 rue XioXio',
            'country' => 'China',
            'telephone' => '+08 927 828 821',
            'email' => 'xiaomi.provider@xiami.com'
        ],
        [
            'companyName' => 'Honor',
            'address' => '82 Street Square Hondulas',
            'country' => 'United States',
            'telephone' => '+02 028 183 493',
            'email' => 'honor.provider@honor.com'
        ],
        [
            'companyName' => 'OnePlus 7',
            'address' => '82 Street Bonaparte',
            'country' => 'United States',
            'telephone' => '+01827738499',
            'email' => 'oneplus.provider@oneplus.com'
        ],
        [
            'companyName' => 'Apple',
            'address' => '102 Street Apple',
            'country' => 'United States',
            'telephone' => '+01827738499',
            'email' => 'apple.provider@apple.com'
        ],
    ];

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Provider::class, 5, function (Provider $provider, $i) {

            $provider->setCompanyName(self::$provider[$i]['companyName']);
            $provider->setAddress(self::$provider[$i]['address']);
            $provider->setCountry(self::$provider[$i]['country']);
            $provider->setTelephone(self::$provider[$i]['telephone']);
            $provider->setEmail(self::$provider[$i]['email']);
        });

        $manager->flush();
    }
}
