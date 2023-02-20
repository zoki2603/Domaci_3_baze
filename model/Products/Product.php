<?php
include_once "PDV.php";
class Product implements PDV
{
    public  $id;
    public  $name;
    public float $price;
    public $image;
    public  $description;
    public int $quantity;
    public Category $category;



    public function __construct($id, $name, $price, $image, int $quantity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
        $this->quantity = $quantity;
        //     $this->category = $category;
    }

    public static function addProduct($name, $price, $image, $description, $quantity, $category, $conn)
    {
        try {
            $q = "INSERT INTO products (name, price, image, description,quantity,category_id) 
            VALUES ('$name', $price, '$image', '$description',$quantity,$category)";
            $result = mysqli_query($conn->getConnection(), $q);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function getAllProducts($conn)
    {
        try {
            $q = "SELECT * FROM products";
            $result = mysqli_query($conn->getConnection(), $q);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function deleteProduct($id, $conn)
    {
        try {
            $q = "DELETE FROM products WHERE id =$id";
            $result = mysqli_query($conn->getConnection(), $q);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function updateProduct($name, $price, $image, $description, $quantity, $category, $id, $conn)
    {
        try {
            $q = "UPDATE products SET name = '$name', price = $price, image = '$image', description = '$description',quantity = $quantity,category_id = $category WHERE id =$id";
            $result = mysqli_query($conn->getConnection(), $q);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
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
        // var_dump($sum);
        return number_format($sum, 2);
    }


    public function priceWithPDV()
    {
        $sum = $this->getPrice() + floatval($this->PDV());
        // var_dump($sum);

        return floatval($sum);
    }


    public function sumPrice()
    {
        if (is_numeric(floatval($this->priceWithPDV())) && is_numeric($this->quantity)) {

            $sum = $this->priceWithPDV() * $this->quantity;
            return number_format($sum, 2);
        } else {

            return 0;
        }
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


    public  function __toString()
    {
        return " Uspesno ste kupili  proizvode havala Vam na poseti.  ";
    }
}
