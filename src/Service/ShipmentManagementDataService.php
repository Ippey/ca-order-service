<?php

namespace App\Service;

use App\Core\ShipmentManagementDataServiceInterface;
use App\Repository\DeliveryClerkRepository;

class ShipmentManagementDataService implements ShipmentManagementDataServiceInterface
{
    public function __construct(private DeliveryClerkRepository $deliveryClerkRepository)
    {
    }

    public function findDeliveryClerks(): array
    {
        return $this->deliveryClerkRepository
            ->findAll()
            ;
    }

}