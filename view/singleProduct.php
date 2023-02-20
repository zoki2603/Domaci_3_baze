<?php

include_once "../DB/dbconnect.php";
include_once "../model/Products/Product.php";
session_start();
$conn = DB::getInstance();
$products = Product::getAllProducts($conn);
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

    <title>Shop</title>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <h1>SHOP</h1>
        </div>
        <ul class="menu">
            <?php
            if (!isset($_SESSION["user"])) { ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="">Registar</a></li>
            <?php } else { ?>
                <li><a href="home.php">Home</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php } ?>
            <li><a href="cartItems.php"><span></span><i class="fas fa-shopping-cart"></i></a></li>

            <div class="menu-btn">
                <i class="fa fa-bars"></i>
            </div>
    </nav>
    <h1 class="pheading">Single Products</h1>

    <sectoin class="sec">
        <div class="products">
            <!-- Start Card -->
            <?php

            foreach ($products as $key => $product) {   ?>

                <?php if ($product["id"] == $_GET['id']) { ?>
                    <form action="../controler/CartController.php" method="POST">

                        <div class="card">
                            <div class="img"><img src="../img/<?php echo $product["image"] ?>" width="500" alt=""></div>
                            <div class="desc"><?php echo $product["description"] ?></div>
                            <div class="title"><?php echo $product["name"] ?></div>
                            <input type="number" name="quantity" class="form-control" min="0" value="1" />
                            <input type="hidden" name="id" value="<?php echo $product["id"] ?>">
                            <div class="box">
                                <div class="price"><?php echo $product["price"] ?>$</div>
                                <?php if (isset($_SESSION["user"])) { ?>
                                    <button class="btn" name="addToCart">Buy Now</button>
                                <?php } else {
                                    "";
                                } ?>
                            </div>
                        </div>
                    </form>
                <?php  } ?>
            <?php  } ?>

            <!-- End Card -->

        </div>
    </sectoin>

    <footer>
        <p>Copyrights at <a href="">Shop</a></p>
    </footer>
</body>

</html>