<?php

namespace App\Tests\Core;

use App\Core\ShipmentManagement;
use App\Core\ShipmentManagementDataServiceInterface;
use App\Entity\DeliveryClerk;
use App\Entity\Order;
use PHPUnit\Framework\TestCase;

class ShipmentManagementTest extends TestCase
{
    /**
     * @test
     */
    public function createNotification(): void
    {
        $order = new Order();
        $clerks = [
            new DeliveryClerk(),
            new DeliveryClerk(),
        ];
        $dataService = $this->createMock(ShipmentManagementDataServiceInterface::class);
        $dataService->method('findDeliveryClerks')
            ->willReturn($clerks);
        $management = new ShipmentManagement($dataService);
        $notifications = $management->createNotifications($order);

        $this->assertCount(count($clerks), $notifications);
        for ($i = 0; $i < count($clerks); ++$i ) {
            $clerk = $clerks[$i];
            $notification = $notifications[$i];
            $this->assertSame($clerk, $notification->getDeliveryClerk());
            $this->assertSame($order, $notification->getOrder());
        }
    }
}
