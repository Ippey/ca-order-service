<?php

namespace App\Core;

use App\Entity\Item;
use App\Entity\Order;
use App\Entity\OrderDetail;
use App\Entity\User;

class Purchase
{
    public function createOrder(User $user, Item $item, int $quantity): Order
    {
        $orderDetail = new OrderDetail();
        $orderDetail
            ->setName($item->getName())
            ->setPrice($item->getPrice())
            ->setQuantity($quantity)
            ->setItem($item)
            ->calculateSubtotal()
            ;

        $order = new Order();
        $order
            ->setName($user->getName())
            ->setPostcode($user->getPostcode())
            ->setAddress($user->getAddress())
            ->setTel($user->getTel())
            ->setUser($user)
            ->setOrderedAt(new \DateTimeImmutable())
            ->addOrderDetail($orderDetail)
            ->calculateTotal()
        ;

        return $order;
    }
}
