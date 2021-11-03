<?php

namespace App\Entity;

class Notification
{
    private ?Order $order = null;
    private ?DeliveryClerk $deliveryClerk = null;

    /**
     * @return Order|null
     */
    public function getOrder(): ?Order
    {
        return $this->order;
    }

    /**
     * @param Order|null $order
     * @return Notification
     */
    public function setOrder(?Order $order): self
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return DeliveryClerk|null
     */
    public function getDeliveryClerk(): ?DeliveryClerk
    {
        return $this->deliveryClerk;
    }

    /**
     * @param DeliveryClerk|null $deliveryClerk
     * @return Notification
     */
    public function setDeliveryClerk(?DeliveryClerk $deliveryClerk): self
    {
        $this->deliveryClerk = $deliveryClerk;
        return $this;
    }
}