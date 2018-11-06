<?php

namespace DI0;


class Customer
{
    // ..........

    /**
     * @var int
     */
    private $currentOrder;

    /**
     * @return bool
     */
    public function buyItems()
    {
        if (is_null($this->currentOrder)) {
            return false;
        }

        $processor = new OrderProcessor();
        return $processor->checkout($this->currentOrder);
    }

    // ..........
}


class OrderProcessor
{
    /**
     * @param $order
     * @return bool
     */
    public function checkout(int $order) : bool
    {
        // ..........
    }
}











namespace DI1;


class Customer
{
    // ..........

    /**
     * @var int
     */
    private $currentOrder;

    /**
     * @param OrderProcessor $processor
     * @return bool
     */
    public function buyItems(OrderProcessor $processor)
    {
        if (is_null($this->currentOrder)) {
            return false;
        }

        return $processor->checkout($this->currentOrder);
    }

    // ..........
}


class OrderProcessor
{
    /**
     * @param $order
     * @return bool
     */
    public function checkout(int $order) : bool
    {
        // ..........
    }
}

$processor = new OrderProcessor();
$customer = new Customer();

$customer->buyItems($processor);