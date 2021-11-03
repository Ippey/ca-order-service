<?php

namespace App\Core;

use App\Entity\Notification;
use App\Entity\Order;

class ShipmentManagement
{
    public function __construct(private ShipmentManagementDataServiceInterface $dataService)
    {
    }

    /**
     * @return array<Notification>
     */
    public function createNotifications(Order $order): array
    {
        $notifications = [];
        $clerks = $this->dataService->findDeliveryClerks();

        foreach ($clerks as $clerk) {
            $notification = new Notification();
            $notification
                ->setOrder($order)
                ->setDeliveryClerk($clerk)
                ;
            $notifications[] = $notification;
        }

        return $notifications;
    }
}
