<?php
include_once "PDV.php";
class Product implements PDV
{
    public int $id;
    public string $name;
    public float $price;
    public $image;
    public  $description;
    public  $quantity;
    public Category $category;



    public function __construct($id, $name, $price, $image, $amount)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
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

    // public function reduceAmount($quantity = 1)
    // {
    //     if ($this->amount >= $quantity) {
    //         $this->amount -= $quantity;
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    public function removeFromCart(Cart $cart)
    {
        return $cart->removeProduct($this);
    }

    public  function __toString()
    {
        return " Uspesno ste kupili  proizvode havala Vam na poseti.  ";
    }
}
