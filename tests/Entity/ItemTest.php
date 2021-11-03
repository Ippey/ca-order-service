<?php

namespace App\Tests\Entity;

use App\Core\Exception\OutOfStockException;
use App\Entity\Item;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    /**
     * @test
     * @dataProvider dataProviderForReduceStock
     * @throws OutOfStockException
     */
    public function reduceStock($stock, $quantity): void
    {
        $item = new Item();
        $item
            ->setStock($stock)
            ;

        $item->reduceStock($quantity);
        $this->assertEquals($stock - $quantity, $item->getStock());
    }

    public function dataProviderForReduceStock(): array
    {
        return [
            'greaterThan' => [
                'stock' => 7,
                'quantity' => 5,
            ],
            'even' => [
                'stock' => 7,
                'quantity' => 7,
            ],
        ];
    }

    /**
     * @test
     * @throws OutOfStockException
     */
    public function reduceStockIfOutOfStock()
    {
        $stock = 5;
        $quantity = 7;
        $item = new Item();
        $item
            ->setStock($stock)
        ;

        $this->expectException(OutOfStockException::class);
        $item->reduceStock($quantity);
    }
}
