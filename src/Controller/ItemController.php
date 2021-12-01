<?php

namespace App\Controller;

use App\Entity\Item;
use App\Repository\ItemRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItemController extends AbstractController
{
    #[Route('/item', name: 'item')]
    public function index(ItemRepository $itemRepository): Response
    {
        $items = $itemRepository->findAll();
        return $this->render('item/index.html.twig', [
            'items' => $items,
        ]);
    }

    #[Route('/item/add', name: 'item_add')]
    public function add(EntityManagerInterface $entityManager): Response
    {
        $item = new Item();
        $entityManager->persist($item);
        $entityManager->flush();

        return $this->redirectToRoute('item');
    }
}
