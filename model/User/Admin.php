<?php
include_once "Person.php";
class Admin extends Person
{

    protected $tip;

    public function __construct($id, $name, $lastname, $email, $password, $city, $address, $tip)
    {

        parent::__construct($id, $name, $lastname, $email, $password, $city, $address);
        $this->tip = $tip;
    }

    public static function adminRegister($name, $lastname,  $city, $address, $email,  $password, $tip, $conn)
    {
        try {
            $query  = "INSERT INTO users (name,lastname,city,address,email,password,tip) 
            VALUE ('$name','$lastname','$email','$password','$city','$address','$tip')";
            $result = mysqli_query($conn->getConnection(), $query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
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


    public function setAddress($address)
    {
        $this->address = $address;
    }


    public function getTip()
    {
        return $this->tip;
    }
}
