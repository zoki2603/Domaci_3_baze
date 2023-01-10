<?php

class Cart
{
    public $products;

    public function __construct()
    {
        $this->products = array();
    }
    public function addProduct(Product $product, $quantity)
    {

        foreach ($this->products as $key => $p) {
            if ($p->id == $product->id) {
                $p->quantity += $quantity;
                return;
            }
        }
        $this->products[] = $product;
    }

    public function removeProduct(Product $product)
    {
        // Proveravamo da li je proizvod u korpi
        foreach ($this->products as $key => $p) {
            if ($p->id == $product->id) {
                unset($this->products[$key]);
            }
        }
    }
    public function sumAll()
    {
        $totalSum = 0;
        foreach ($this->products as $product) {
            $totalSum += $product->getQuantity() * $product->priceWithPDV();
        }
        return number_format($totalSum, 2);
    }
    public static function emptyCart()
    {
        unset($_SESSION['cart']);
    }
}
