<?php


namespace App\Tests;

use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserEntityTest extends KernelTestCase{
    public function getUser(): User{
        return (new User())
        ->setFirstname("John")
        ->setLastname("King")
        ->setEmail("john@doe.fr")
        ->setAdresse("ezafrarfrr")
        ->setTel("123456")
        ->setRoles(['ROLE_USER'])
        ;
    }
    public function testValidUser(ValidatorInterface $validator){
        $user = $this->getUser();
        self::bootKernel();
        $container = static::getContainer();

        $errors = $container->get('validator')->validate($user);
        $this->assertCount(0,$errors,'oupsi'.print_r($errors));
    }
}