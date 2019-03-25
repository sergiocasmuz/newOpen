<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class Usuarios extends Fixture
{
    private $passwordEncoder;

     public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
         $this->passwordEncoder = $passwordEncoder;
     }

    public function load(ObjectManager $manager)
    {
         $usuario = new \App\Entity\Usuarios();


                 $user->setPassword($this->passwordEncoder->encodePassword(
                         $user,
                         'the_new_password'
                     ));

        $manager->persist($usuario);

        $manager->flush();
    }
}
