<?php 

namespace App\Tests\Repository;

use App\Repository\VinylRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class VinylRepositoryTest extends KernelTestCase{
  public function testCount(){
      self::bootKernel();
      $container = static::getContainer();

      $nbVinyl = $container->get(VinylRepository::class)->count([]);
      $this->assertEquals(70,$nbVinyl,"error il y a $nbVinyl disques");
  }

}