<?php

namespace App\Controller;

use App\Core\Purchase;
use App\Event\OrderedEvent;
use App\Repository\ItemRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PurchaseController extends AbstractController
{
    #[Route('/purchase', name: 'purchase')]
    public function index(
        ItemRepository $itemRepository,
        UserRepository $userRepository,
        Purchase $useCase,
        EntityManagerInterface $entityManager,
        EventDispatcherInterface $eventDispatcher
    ): Response {
        // とりあえずの処理
        $user = $userRepository->find(1);
        $item = $itemRepository->find(1);
        $quantity = 2;

        // 注文処理
        $order = $useCase->createOrder($user, $item, $quantity);
        $entityManager->persist($order);
        $entityManager->flush();

        // 注文したイベントを送る
        $event = new OrderedEvent($order);
        $eventDispatcher->dispatch($event);

        return $this->render('purchase/index.html.twig', [
            'controller_name' => 'PurchaseController',
        ]);
    }
}
