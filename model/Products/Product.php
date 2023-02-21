<?php

include_once "PDV.php";
include_once "../model/User/Customer.php";

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
    public static function buyProducts($id_product, $id_user, $price, $quantity, $date, $conn)

    {
        // Dohvati sve proizvode iz korpe
        $products = $_SESSION['cart']->getProducts();


        $values = array();

        // svi proizvode u korpi
        foreach ($products as $product) {
            $id_product = $product->getId();
            $price = $product->getPrice();
            $quantity = $product->getQuantity();
            $date = date("Y-m-d H:i:s");

            // Dodavanje vrednosti za upit
            $values[] = "($id_product, $id_user, $price, $quantity, '$date')";

            // Azuriranje kolicine proizvoda
            $query = "UPDATE products SET quantity = quantity - $quantity WHERE id = $id_product";
            $result = mysqli_query($conn->getConnection(), $query);
        }

        // Spajanje svih vrednosti u jedan string
        $values = implode(",", $values);

        //  kupovinu proizvoda
        $query = "INSERT INTO purchase (id_product, id_user, price, quantity, date) VALUES $values";

        // Izvrsi  upit
        if (mysqli_query($conn->getConnection(), $query)) {
            echo "Uspesno ste kupili proizvode!";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn->getConnection());
        }
    }
    public static function getAllPurchaseProducts($conn)
    {
        try {
            $query = "SELECT users.name as username,users.lastname,users.address,users.city, products.name as productName, purchase.quantity, purchase.price ,purchase.date ,purchase.id_user 
            FROM purchase
            INNER JOIN users ON purchase.id_user = users.id
            INNER JOIN products ON purchase.id_product = products.id";
            $result = mysqli_query($conn->getConnection(), $query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public static function getAllPurchase($conn)
    {
        try {
            $query = "SELECT DISTINCT users.name,users.lastname,purchase.date,purchase.id_user
            FROM purchase
            INNER JOIN users ON purchase.id_user = users.id ";
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
    public  function __toString()
    {
        return " Uspesno ste kupili  proizvode havala Vam na poseti.  ";
    }
}
