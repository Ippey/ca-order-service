<?php

namespace App\Event;

use App\Entity\Order;
use Symfony\Contracts\EventDispatcher\Event;

class OrderedEvent extends Event
{
    public function __construct(private Order $order)
    {
    }

    public function getOrder(): Order
    {
        return $this->order;
    }
}
