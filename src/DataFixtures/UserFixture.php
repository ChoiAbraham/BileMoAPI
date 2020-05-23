<?php

namespace App\DataFixtures;

use App\Entity\Client;
use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixture extends BaseFixture
{
    private static $lastNames = [
        'LeBatelier',
        'Labonté',
        'Parent',
        'Margand',
        'Quessy',
        'Vadeboncoeur',
        'Gousse',
        'Abraham Choi',

        'LeBatelier2',
        'Labonté2',
        'Parent2',
        'Margand2',
        'Quessy2',
        'Vadeboncoeur2',
        'Gousse2',

        'LeBatelier3',
        'Labonté3',
        'Parent3',
        'Margand3',
        'Quessy3',
        'Vadeboncoeur3',
        'Gousse3',

        'LeBatelier4',
        'Labonté4',
        'Parent4',
        'Margand4',
        'Quessy4',
        'Vadeboncoeur4',
        'Gousse4',

        'LeBatelier5',
        'Labonté5',
        'Parent5',
        'Margand5',
        'Quessy5',
        'Vadeboncoeur5',
        'Gousse5',

        'LeBatelier6',
        'Labonté6',
        'Parent6',
        'Margand6',
        'Quessy6',
        'Vadeboncoeur6',
        'Gousse6',

        'LeBatelier7',
        'Labonté7',
        'Parent7',
        'Margand7',
        'Quessy7',
        'Vadeboncoeur7',
        'Gousse7',

        'LeBatelier8',
        'Labonté8',
        'Parent8',
        'Margand8',
        'Quessy8',
        'Vadeboncoeur8',
        'Gousse8',

        'LeBatelier9',
        'Labonté9',
        'Parent9',
        'Margand9',
        'Quessy9',
        'Vadeboncoeur9',
        'Gousse9',

        'LeBatelier10',
        'Labonté10',
        'Parent10',
        'Margand10',
        'Quessy10',
        'Vadeboncoeur10',
        'Gousse10',
    ];

    private static $firstNames = [
        'Simone',
        'Karel',
        'Harbin',
        'Pénélope',
        'Vachel',
        'Yolande',
        'Jacquenett',
        'Abraham',
    ];

    private static $email = [
        'SimoneLeBatelier@rhyta.com',
        'KarelLabonte@teleworm.us',
        'HarbinParent@armyspy.com',
        'PenelopeMargand@dayrep.com',
        'VachelQuessy@rhyta.com',
        'YolandeVadeboncoeur@jourrapide.com',
        'JacquenettGousse@dayrep.com',
        'abraham.choi@yahoo.fr',
    ];

    private static $address = [
        'adresse 1'
    ];

    private static $country = [
        'France'
    ];

    private static $telephone = [
        '+33 6 42 22 22 22'
    ];

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(User::class, 60, function (User $user, $i) {
            $randomNumber = random_int(0,3);
            $randomFirstName = random_int(0,5);
            $randomEmail = random_int(0,6);
            $user->setFirstName(self::$firstNames[$randomFirstName]);
            $user->setLastName(self::$lastNames[$i]);
            $user->setEmail($i . '_' . self::$email[$randomEmail]);
            $user->setAddress(self::$address[0]);
            $user->setCountry(self::$country[0]);
            $user->setTelephone(self::$telephone[0]);
            $user->setClient($this->getReference(Client::class . '_' . $randomNumber));

            // Pour récupérer User instance in tests
            // voir doc liip bundle
//            $this->setReference('userRef_' . $i, $user);
        });

        $manager->flush();
    }
}
