<?php

namespace App\Tests\Core;

use App\Core\Purchase;
use App\Entity\Item;
use App\Entity\OrderDetail;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class PurchaseTest extends TestCase
{
    /**
     * @test
     */
    public function testCreateOrder(): void
    {
        $user = new User();
        $user
            ->setName('お名前')
            ->setPostcode('111-2222')
            ->setAddress('大阪府')
            ->setTel('090-0000-1111')
            ;
        $item = new Item();
        $item
            ->setName('商品')
            ->setPrice(100)
            ->setStock(20)
            ;
        $quantity = 10;

        $purchase = new Purchase();
        $order = $purchase->createOrder($user, $item, $quantity);

        $this->assertSame($user, $order->getUser());
        $this->assertEquals($user->getName(), $order->getName());
        $this->assertEquals($user->getPostcode(), $order->getPostcode());
        $this->assertEquals($user->getAddress(), $order->getAddress());
        $this->assertEquals($user->getTel(), $order->getTel());
        $this->assertCount(1, $order->getOrderDetails());
        $this->assertEquals($item->getPrice() * $quantity, $order->getTotal());

        $orderDetail = $order->getOrderDetails()?->first();
        $this->assertInstanceOf(OrderDetail::class, $orderDetail);
        $this->assertSame($item, $orderDetail->getItem());
        $this->assertEquals($item->getName(), $orderDetail->getName());
        $this->assertEquals($item->getPrice(), $orderDetail->getPrice());
        $this->assertEquals($quantity, $orderDetail->getQuantity());
        $this->assertEquals($item->getPrice() * $quantity, $orderDetail->getSubtotal());
    }
}
