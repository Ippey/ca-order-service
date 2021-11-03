<?php

namespace App\Tests\Entity;

use App\Entity\OrderDetail;
use PHPUnit\Framework\TestCase;

class OrderDetailTest extends TestCase
{
    public function testCalculateSubtotal(): void
    {
        $orderDetail = new OrderDetail();
        $orderDetail->setPrice(100);
        $orderDetail->setQuantity(3);
        $orderDetail->calculateSubtotal();

        $this->assertEquals(300, $orderDetail->getSubtotal());
    }
}
