<?php
include_once "../DB/dbconnect.php";
include_once "../model/Products/Product.php";
$conn = DB::getInstance();
session_start();
if (!isset($_SESSION['user'])) {
    // Ako korisnik nije prijavljen, preusmjeri ga na stranicu za prijavu
    header("Location: login.php");
    exit();
}

// Provjeri razinu pristupa korisnika
if ($_SESSION['user']->getTip() !== '1') {
    // Ako korisnik nije admin, prikaži poruku o zabrani pristupa
    echo "Nemate dozvolu za pristup ovoj stranici.";
    exit();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">


    <title>Shop</title>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <h1>SHOP</h1>
        </div>
        <ul class="menu">
            <li><a href="purchase.php">Purchase</a></li>
            <li><a href="adminRegister.php">Registar</a></li>
            <li><a href="admin.php">Admin</a></li>
            <li><a href="logout.php">Logout</a></li>

    </nav>

    <section class="my-5 py-5">
        <div class="container text-center  mt-3 pt-5">
            <h2 class="form-weight-bold">Register</h2>
            <hr class="hr">
        </div>
        <div class="mx-auto container ">
            <form action="" id="login-form" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname">
                </div>
                <div class="form-group">
                    <label for="">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="City">
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="emil" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Password">
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="check" id="" value="1">
                    <label class="form-check-label" for="">Admin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="check" id="" value="0">
                    <label class="form-check-label" for="">Customer</label>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn" name="submit" id="login-btn" value="Register">
                </div>

            </form>
        </div>
    </section>



    <footer>
        <p>Copyrights at <a href="">Shop</a></p>
    </footer>


</body>

</html>