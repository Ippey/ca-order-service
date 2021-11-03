<?php

namespace App\DataFixtures;

use App\Entity\DeliveryClerk;
use App\Entity\Item;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user
            ->setName('テスト太郎')
            ->setEmail('test@some-domain')
            ->setPostcode('111-2222')
            ->setAddress('大阪府なんとか市')
            ->setTel('090-0000-1111')
            ;
        $manager->persist($user);

        $item = new Item();
        $item
            ->setName('商品')
            ->setPrice(1200)
            ->setStock(100)
            ;
        $manager->persist($item);

        $deliveryClerk = new DeliveryClerk();
        $deliveryClerk
            ->setName('担当者')
            ->setEmail('delivery@some-domain')
            ->setIsActive(true)
            ;
        $manager->persist($deliveryClerk);

        $manager->flush();
    }
}
