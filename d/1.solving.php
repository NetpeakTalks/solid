<?php

namespace DI2;


class Customer
{
    // ..........

    /**
     * @var int
     */
    private $currentOrder;

    /**
     * @param IOrderProcessor $processor
     * @return bool
     */
    public function buyItems(IOrderProcessor $processor)
    {
        if (is_null($this->currentOrder)) {
            return false;
        }

        return $processor->checkout($this->currentOrder);
    }

    // ..........
}

interface IOrderProcessor
{
    /**
     * @param int $order
     * @return bool
     */
    public function checkout(int $order) : bool ;
}

class OrderProcessor implements IOrderProcessor
{
    /**
     * @inheritdoc
     */
    public function checkout(int $order) : bool
    {
        // ..........
    }
}


$processor = new OrderProcessor();
$customer = new Customer();

$customer->buyItems($processor);