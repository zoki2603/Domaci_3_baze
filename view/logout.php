<?php
session_start();
unset($_SESSION["logovani-korinsik"]);
unset($_SESSION["cart"]);
header("Location:login.php");
exit();
