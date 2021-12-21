<?php

namespace App\DataFixtures;

use App\Entity\Account;
use App\Entity\Administrator;
use App\Entity\Passport;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->passwordEncoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        $passport = new Passport();
        $passport->setBirthday(DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s')));
        $passport->setPassportIssuedBy('УМВД РОССИИ ПО ЛИПЕЦКОЙ ОБЛАСТИ');
        $passport->setPassportSeries('4213');
        $passport->setPassportNumber('852590');
        $passport->setSex(false);

        $account = new Account();
        $account->setPassword($this->passwordEncoder->hashPassword($account, 'qwerty123'));
        $account->setEmail('admin@mail.ru');
        $account->setFirstName('Иван');
        $account->setLastName('Сидоров');
        $account->setLogin('admin');
        $account->setPassport($passport);
        $account->setRoles(['ROLE_ADMIN']);
        $account->setPhoneNumber('+79999999999');

        $administrator = new Administrator();
        $administrator->setAccount($account);

        $manager->persist($passport);
        $manager->persist($account);
        $manager->persist($administrator);

        $manager->flush();
    }
}
