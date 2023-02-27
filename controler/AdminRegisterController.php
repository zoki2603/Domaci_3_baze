<?php
include_once "../DB/dbconnect.php";
require "../model/User/Admin.php";

$conn = DB::getInstance();

if (isset($_POST["admin_reg"])) {

    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $city = $_POST["city"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $tip = $_POST["check"];

    $password = $_POST["password"];
    $password = password_hash($password, PASSWORD_DEFAULT);
    if (!empty($name) && !empty($lastname) && !empty($city) && !empty($address) && !empty($email) && !empty($password) && !empty($tip)) {
        // Proveravamo da li postoji korisnik sa unetom email adresom u bazi podataka
        $q = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn->getConnection(), $q);

        if (mysqli_num_rows($result) > 0) {
            // Korisnik sa unetom email adresom vec postoji u bazi podataka
            echo "Korisnik sa unetom email adresom vec postoji u bazi podataka";
        } else {
            if (Admin::adminRegister($name, $lastname, $city, $address, $email, $password, $tip, $conn)) {
                header("Location:../view/admin.php");
                exit();
            } else {
                header("Location:../view/adminRegister.php");
                exit();
            }
        }
    }
}
