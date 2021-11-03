<?php

namespace App\Entity;

class Notification
{
    private ?Order $order = null;
    private ?DeliveryClerk $deliveryClerk = null;

    public function getOrder(): ?Order
    {
        return $this->order;
    }

    /**
     * @return Notification
     */
    public function setOrder(?Order $order): self
    {
        $this->order = $order;

        return $this;
    }

    public function getDeliveryClerk(): ?DeliveryClerk
    {
        return $this->deliveryClerk;
    }

    /**
     * @return Notification
     */
    public function setDeliveryClerk(?DeliveryClerk $deliveryClerk): self
    {
        $this->deliveryClerk = $deliveryClerk;

        return $this;
    }
}
