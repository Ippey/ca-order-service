<?php

namespace App\EventSubscriber;

use App\Core\ShipmentManagement;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use App\Event\OrderedEvent;

class NotifyNewOrderSubscriber implements EventSubscriberInterface
{
    public function __construct(private ShipmentManagement $shipmentManagement, private LoggerInterface $logger)
    {
    }

    public function onOrderedEvent(OrderedEvent $event)
    {
        $notifications = $this->shipmentManagement->createNotifications($event->getOrder());

        // 何かしらの通知処理
        foreach ($notifications as $notification) {
            $message = sprintf(
                '%sさんへ。%sさんから注文がありました。（id: %d）',
                $notification->getDeliveryClerk()->getName(),
                $notification->getOrder()->getName(),
                $notification->getOrder()->getId()
            );
            $this->logger->notice($message);
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            OrderedEvent::class => 'onOrderedEvent',
        ];
    }
}
