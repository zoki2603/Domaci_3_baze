<?php
abstract class Person
{
	protected int $id;
	protected string $name;
	protected string $lastname;
	protected string $email;
	protected string $password;

	protected string $city;
	protected string $streetName;

	public function __construct($id, $name, $lastname, $email, $password, $city, $streetName)
	{
		$this->id = $id;
		$this->name = $name;
		$this->lastname = $lastname;
		$this->email = $email;
		$this->password = $password;
		$this->city = $city;
		$this->streetName = $streetName;
	}


	abstract public function getId();


	abstract public function setId($id);


	abstract public function getName();


	abstract public function setName(string $name);


	abstract public function getLastname();



	abstract public function setLastname(string $lastname);


	abstract public function getEmail();


	abstract public function setEmail(string $email);


	abstract public function getPassword();



	abstract public function setPassword(string $password);


	abstract public function getCity();



	abstract public function setCity(string $city);



	abstract public function getStreetName();


	abstract public function setStreetName(string $streetName);
}
