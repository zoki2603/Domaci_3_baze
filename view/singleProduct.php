<?php
session_start();
// include_once "../loaddata.php";
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

            foreach ($_SESSION["proizvodi"] as $key => $product) {   ?>

                <?php if (intval($product->id) == intval($_GET['id'])) { ?>
                    <form action="home.php" method="POST">

                        <div class="card">
                            <div class="img"><img src="../img/<?php echo $product->image ?>" alt=""></div>
                            <div class="desc">Opis</div>
                            <div class="title"><?php echo $product->productName ?></div>
                            <input type="number" name="quantity" class="form-control" min="0" value="1" />
                            <input type="hidden" name="name" class="form-control" value="<?php echo $product->productName ?>" />
                            <input type="hidden" name="price" class="form-control" value="<?php echo $product->price ?>" />
                            <input type="hidden" name="id" value="<?php echo $product->id ?>">
                            <input type="hidden" name="amaunt" value="<?php $product->amaunt; ?>">
                            <input type="hidden" name="image" value="<?php echo $product->image ?>">
                            <div class="box">
                                <div class="price"><?php echo $product->price ?>$</div>
                                <?php if (isset($_SESSION["logovani-korinik"])) { ?>
                                    <button class="btn" name="add_product">Buy Now</button>
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