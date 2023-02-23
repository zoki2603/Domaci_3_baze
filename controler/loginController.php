<?php
session_start();
include_once "../DB/dbconnect.php";
include_once "../model/User/Customer.php";

$conn = DB::getInstance();

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $q = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn->getConnection(), $q);

    // Proveravamo da li smo dobili tacno jedan rezultat
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Proveravamo da li se uneta lozinka podudara sa kriptovanom lozinkom u bazi podataka
        if (password_verify($password, $row['password'])) {
            // Lozinka je tacna, prijavljujemo korisnika
            $user = new Customer($row["id"], $row["name"], $row["lastname"], $row["city"], $row["address"], $row["email"], $row["password"], $row["money"], $row["tip"]);
            $_SESSION["user"] = $user;

            if ($user->getTip() == 0) {
                header("Location:../view/home.php");
            } elseif ($user->getTip() == 1) {
                header("Location:../view/admin.php");
            }
        } else {
            echo "Lozinka nije tacna";
        }
    } else {
        echo "Korisnik sa unetom email adresom ne postoji u bazi podataka";
    }
}
