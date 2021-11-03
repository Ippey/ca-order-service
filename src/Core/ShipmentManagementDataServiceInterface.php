<?php

namespace App\Core;

interface ShipmentManagementDataServiceInterface
{
    /**
     * @return array<DeliveryClerk>
     */
    public function findDeliveryClerks(): array;
}
