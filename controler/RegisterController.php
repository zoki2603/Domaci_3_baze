<?php
include_once "../DB/dbconnect.php";
require "../model/User/Customer.php";

$conn = DB::getInstance();

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $city = $_POST["city"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password = password_hash($password, PASSWORD_DEFAULT);
    if (!empty($name) && !empty($lastname) && !empty($city) && !empty($address) && !empty($email) && !empty($password)) {
        // Proveravamo da li postoji korisnik sa unetom email adresom u bazi podataka
        $q = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn->getConnection(), $q);

        if (mysqli_num_rows($result) > 0) {
            // Korisnik sa unetom email adresom vec postoji u bazi podataka
            echo "Korisnik sa unetom email adresom vec postoji u bazi podataka";
        } else {
            if (Customer::register($name, $lastname, $email, $password, $city,  $address, $conn, $money = 1000, $tip = 0)) {
                header("Location:../view/login.php");
                exit();
            } else {
                header("Location:../view/register.php");
                exit();
            }
        }
    }
}
