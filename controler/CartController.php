<?php

include_once "../DB/dbconnect.php";
include_once "../model/Products/Product.php";
include_once "../model/Cart/Cart.php";
if (!isset($_SESSION)) {
    session_start();
}
$conn = DB::getInstance();
if (!isset($_SESSION["cart"])) {
    $_SESSION['cart'] = new Cart();
}
$products = Product::getAllProducts($conn);

$cart = $_SESSION['cart'];

if (isset($_POST["addToCart"])) {
    // Dodajemo proizvod u korpu
    $id = $_POST["id"];


    foreach ($products as $product) {
        if ($product["id"] == $id) {
            $purchaseQuantity = $_POST['quantity'];
            $name = $product["name"];
            $price  = $product["price"];
            $image = $product["image"];
            $description = $product["description"];
            $category = $product["category_id"];

            $product = new Product($id, $name, $price, $image, $purchaseQuantity);
            $cart->addProduct($product, $purchaseQuantity);
            header("Location:../view/home.php");
            exit();
        }
    }
}
if (isset($_POST["removeProduct"])) {
    foreach ($cart as $products) {
        foreach ($products as $product) {
            $id  = $product->id;
            $cart->removeProduct($id);
            header("Location:../view/cartItems.php");
            exit();
        }
    }
}

if (isset($_POST["remove_all"])) {
    Cart::emptyCart();
    header("Location:../view/cartItems.php");
    exit();
}
