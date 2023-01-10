<?php

class Customer extends Person
{
    protected $tip;
    protected float $money;
    public function __construct($id, $name, $lastname, $email, $password, $money, $city, $streetName, $tip = 0)
    {
        parent::__construct($id, $name, $lastname, $email, $password, $city, $streetName);
        $this->money = $money;

        $this->tip = $tip;
    }


    public  function getNameAndLastName()
    {
        return $this->name . " " . $this->lastname;
    }


    public function buy(Cart $cart, Product $product, $quantity = 1)
    {
        if ($this->money < $cart->sumAll()) {
            echo "Nemate dovoljno novca da kupite proizvod";
        } else {
            if ($product->reduceAmount($quantity)) {
                $this->money -= $cart->sumAll();
            } else {
                echo "Nema vise proizvoda";
            }
        }
    }
    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getLastname()
    {
        return $this->lastname;
    }


    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail(string $email)
    {
        $this->email = $email;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getMoney()
    {
        return $this->money;
    }
    public function setMoney(float $money)
    {
        $this->money = $money;
    }


    public function getCity()
    {
        return $this->city;
    }


    public function setCity(string $city)
    {
        $this->city = $city;
    }

    public function getStreetName()
    {
        return $this->streetName;
    }


    public function setStreetName(string $streetName)
    {
        $this->streetName = $streetName;
    }


    public function getTip()
    {
        return $this->tip;
    }


    public function setTip($tip)
    {
        $this->tip = $tip;
    }

    public function __toString()
    {
        return "Postovani  {$this->getNameAndLastName()} prozvodi ce biti poslati na adresu 
        {$this->getCity()} {$this->getStreetName()}.";
    }
}
