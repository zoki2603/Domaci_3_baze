<?php
class Category

{
    protected $name;

    public function __construct()
    {
    }


    public function getCategoryName()
    {
        return $this->name;
    }


    public function setCategoryName($name)
    {
        $this->name = $name;
    }
    public static function addCategory($name, $conn)
    {
        try {
            $q = "INSERT INTO category (name) VALUE ('$name')";
            $resalt = mysqli_query($conn->getConnection(), $q);
            return $resalt;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public static function getAllCategory($conn)
    {
        try {
            $q = "SELECT * FROM category";
            $resalt = mysqli_query($conn->getConnection(), $q);
            return $resalt;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
