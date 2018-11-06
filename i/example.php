<?php
namespace i1;
interface ItemInterface
{
    public function applyDiscount($discount);
    public function applyPromocode($promocode);
    public function setColor($color);
    public function setSize($size);

    public function setCondition($condition);
    public function setPrice($price);
}












namespace i2;

interface ItemInterface
{
    public function setCondition($condition);
    public function setPrice($price);
}
interface ClothesInterface
{
    public function setColor($color);
    public function setSize($size);
    public function setMaterial($material);
}
interface DiscountableInterface
{
    public function applyDiscount($discount);
    public function applyPromocode($promocode);
}