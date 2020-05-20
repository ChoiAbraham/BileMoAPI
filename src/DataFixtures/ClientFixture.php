<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ClientFixture extends BaseFixture
{
    /** @var UserPasswordEncoderInterface */
    private $encoder;

    private static $clients = [
        [
            'username' => 'FNAC',
            'password' => 'fnac',
            'firm' => 'fnac',
        ],
        [
            'username' => 'BOULANGER',
            'password' => 'boulanger',
            'firm' => 'boulanger',
        ],
        [
            'username' => 'MAISONDUMONDE',
            'password' => 'maisondumonde',
            'firm' => 'maisondumonde',
        ],
        [
            'username' => 'GOSPORT',
            'password' => 'gosport',
            'firm' => 'gosport',
        ]
    ];

    /**
     * ClientFixture constructor.
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Client::class, 4, function (Client $client, $i) {
            $client->setUsername(self::$clients[$i]['username']);
            $client->setPassword($this->encoder->encodePassword($client, self::$clients[$i]['password']));
            $client->setFirm(self::$clients[$i]['firm']);

            $client->setCreatedAt(new \DateTime(sprintf('-%d days', rand(1, 100))));
        });

        $manager->flush();
    }
}
