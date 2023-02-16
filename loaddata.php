<?php


// include_once "model/User/Person.php";
// include_once "model/User/Customer.php";
// include_once "model/User/Admin.php";
// include_once "model/Products/Product.php";
// // include_once "model/Order/order.php";
// include_once "model/Cart/Cart.php";
// include_once "model/Products/Categories.php";

// if (!isset($_SESSION)) {
//     session_start();
// }

// $customer = new Customer(1, "Milan", "Milic", "milan@gmail.com", "123", 600, "Nis", "Jovana Ducica");
// $admin = new Admin(2, "Admin", "Admin", "admin@admin.com", "123", "Nis", "Sremska");
// $nizKorisnika = [$customer, $admin];


// $p = new Product(1, "Rakija", 200, "rakija.crdownload", 10);
// $p1 = new Product(2, "Kobasica", 250, "kobasica.jpg", 10);
// $p2 = new Product(3, "Bombone", 50, "bombone.jpg", 10);
// $p3 = new Product(4, "Coca-Cola", 150, "coca-cola.webp", 10);
// $p4 = new Product(5, "Cokolada", 100, "cokolada.jpg", 10);
// $nizProizvoda = [$p, $p1, $p2, $p3, $p4];

// $_SESSION["proizvodi"] = $nizProizvoda;
// $_SESSION["korisnici"] = $nizKorisnika;

// if (!isset($_SESSION["cart"])) {
//     $_SESSION['cart'] = new Cart();
// }


// $cart = $_SESSION['cart'];

// if (isset($_POST['add_product'])) {
//     // Dodajemo proizvod u korpu
//     $id = $_POST['id'];
//     $name =  $_POST['name'];
//     $quantity = $_POST['quantity'];
//     $price = $_POST['price'];
//     $image = $_POST["image"];
//     $amaunt = $_POST["amaunt"];
//     $product = new Product($id, $name, $price, $image, $amaunt);
//     $cart->addProduct($product, $quantity);
// }

// if (isset($_POST['remove_product'])) {
//     // Uklanjamo proizvod iz korpe
//     $id = $_POST['id'];
//     $name = $_POST['name'];
//     $quantity = $_POST['quantity'];
//     $price = $_POST['price'];
//     $image = $_POST["image"];
//     $amaunt = $_POST["amaunt"];
//     $product = new Product($id, $name, $price, $image, $amaunt);
//     $product->removeFromCart($cart);
//     include_once "view/cartItems.php";
// }
// nece amount treba provera
// if (isset($_POST["buy-all"])) {
//     $id = $_POST['id'];
//     $name = $_POST['name'];
//     $quantity = $_POST['quantity'];
//     $price = $_POST['price'];
//     $image = $_POST["image"];
//     $amaunt = intval($_POST["amaunt"]);
//     $product = new Product($id, $name, $price, $image, $amaunt);
//     $customer->buy($cart, $product, $quantity);

//     // include_once "view/purchasedProducts.php";
// }
// if (isset($_POST["buy-all"])) {

//     header("Location:purchasedProducts.php");
//     exit();
// }
// if (isset($_POST["remove_all"])) {
//     Cart::emptyCart();
// }
