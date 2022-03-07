<?php

namespace App\RegisterTest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegisterTest extends WebTestCase{
    public function testRegister() {
        $client = static::createClient(); 
        $crawler = $client->request('POST','/register');
        $form = $crawler->selectButton('register');
        $form['register[firstName]'] = 'Jhon';
        $form['register[lastName]'] = 'Doe';
        $form['register[email]'] = 'Jhon@Doe.com';
        $form['register[password]'] = 'azerty';
        $form['register[adresse]'] = 'adresse';
        $form['register[tel]'] = 'tel';
        $form['register[roles]'] = ['ROLE_USER'];
        $crawler= $client->submit($form);
        //
        echo $client->getResponse()->getContent();
    }
}