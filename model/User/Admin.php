<?php

class Admin extends Person
{

    protected $tip;

    public function __construct($id, $name, $lastname, $email, $password, $city, $streetName, $tip = 1)
    {

        parent::__construct($id, $name, $lastname, $email, $password, $city, $streetName);
        $this->tip = $tip;
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
}
