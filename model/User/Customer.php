<?php
include_once "Person.php";
class Customer extends Person
{

    protected $tip;
    protected float $money;
    public function __construct($id, $name, $lastname, $city,  $address, $email, $password, $money, $tip = 0)
    {
        parent::__construct($name, $lastname, $city,  $address, $email, $password);
        $this->money = 1000;

        $this->tip = $tip;
    }


    public  function getNameAndLastName()
    {
        return $this->name . " " . $this->lastname;
    }

    public static function register($name, $lastname,  $city, $address, $email,  $password, $conn, $money = 1000, $tip = 0)
    {
        try {
            $query  = "INSERT INTO users (name,lastname,city,address,email,password,money,tip) 
            VALUE ('$name','$lastname','$email','$password','$city','$address','$money','$tip')";
            $result = mysqli_query($conn->getConnection(), $query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function getAllUsers($conn)
    {
        $q = "SELECT * FROM users";
        $resalt = mysqli_query($conn->getConnection(), $q);
        return $resalt;
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

    public function getAddress()
    {
        return $this->address;
    }


    public function setAddress(string $address)
    {
        $this->address = $address;
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
        {$this->getCity()} {$this->getAddress()}.";
    }
}
