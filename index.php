<?php
include "loaddata.php";



if (!isset($_SESSION["logovani-korinik"])) {
    header("Location: login.php");
} else {
    $korisnik = $_SESSION["logovani-korinik"];

    if ($korisnik->getTip() == 0) {
        header("Location:view/home.php");
        exit();
    } else if ($korisnik->getTip() == 1) {
        header("Location:view/admin.php");
        exit();
    } else {
        echo "404";
        exit();
    }
}
