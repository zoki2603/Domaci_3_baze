<?php
include_once "PDV.php";
class Product implements PDV
{
    public int $id;
    public string $productName;
    public float $price;
    public $image;
    public  $amount;
    public  $quantity;
    public Category $category;



    public function __construct($id, $productName, $price, $image, $amount)
    {
        $this->id = $id;
        $this->productName = $productName;
        $this->price = $price;
        $this->image = $image;
        $this->amount = $amount;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getProductName()
    {
        return $this->productName;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function getAmount()
    {
        return $this->amount;
    }
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function getCategory()
    {
        return $this->category;
    }


    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    public function PDV()
    {
        $percentage = 0.2;
        $sum =  $this->getPrice() * $percentage;
        return number_format($sum, 2);
    }
    public function priceWithPDV()
    {
        $sum = $this->getPrice() + $this->PDV();
        return number_format($sum, 2);
    }
    public function sumPrice()
    {
        $sum = $this->priceWithPDV() * $this->quantity;
        return number_format($sum, 2);
    }

    public function reduceAmount($quantity = 1)
    {
        if ($this->amount >= $quantity) {
            $this->amount -= $quantity;
            return true;
        } else {
            return false;
        }
    }
    public function removeFromCart(Cart $cart)
    {
        return $cart->removeProduct($this);
    }

    public  function __toString()
    {
        return " Uspesno ste kupili  proizvode havala Vam na poseti.  ";
    }
}
