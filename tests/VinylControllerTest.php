<?php
namespace App\Test\Controller;

use App\Repository\UserRepository;
use App\Repository\VinylRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VinylControllerTest extends WebTestCase {

    public function testVinylController(UserRepository $userRepository, VinylRepository $vinylRepository) {
        $routes = ['/vinyl/','/vinyl/new','/vinyl/{id}','/vinyl/{id}/edit','/vinyl/{id}'];
        $container = static::getContainer();
        $nbVinyl = $container->get(VinylRepository::class)->count([]);
        $userAdmin = $userRepository->findby(['email'=>'admin@admin.com']);



        $client = static::createClient();
        $client->request('GET', '/vinyl/');
        $client->request('GET','/');
        $this->assertEquals(200,$client->getResponse()->getStatusCode(),"La page de la requete");
    }
}