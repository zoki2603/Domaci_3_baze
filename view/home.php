<?php

include_once "../DB/dbconnect.php";
include_once "../model/Products/Product.php";
include_once "../model/Cart/Cart.php";
$conn = DB::getInstance();

session_start();

if (isset($_GET['sort-option'])) {
    $sort_option = $_GET['sort-option'];
    if ($sort_option == 'ASC') {
        $products = Product::sortByPriceASC($conn);
    } else if ($sort_option == 'DESC') {
        $products = Product::sortByPriceDESC($conn);
    }
} else {
    $products = Product::getAllProducts($conn);
}
if (isset($_GET['search'])) {
    $searchName = $_GET['search'];

    $products = Product::searchByName($searchName, $conn);
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
                <li><a href="cartItems.php"><span>

                            <?php

                            if (isset($_SESSION["cart"])) {
                                $cart = $_SESSION["cart"];
                                $itemCount = $cart->getProductCount();
                                echo  $itemCount;
                            } else {
                                echo "Korpa je prazna.";
                            }
                            ?>
                        </span><i class="fas fa-shopping-cart"></i></a></li>
            <?php } ?>
            <div class="menu-btn">
                <i class="fa fa-bars"></i>
            </div>
    </nav>
    <section class="content">
        <h1>The Best Shop </h1>
        <p>The Best Prices </p>
        <!-- <button>Shop</button> -->
    </section>

    <h1 class="pheading">All Products</h1>
    <div class="container  ">
        <div class="row justify-content-center align-items-center g-2 ">
            <div class="col">
                <form method="GET" action="home.php">
                    <select class="form-select form-select-sm" name="sort-option" aria-label=".form-select-sm example">
                        <option selected>Izaberi</option>
                        <option value="ASC">Uzlazno</option>
                        <option value="DESC">Silazno</option>
                    </select>
                    <div>
                        <input type="submit" name="sort" style="margin-left: 100%;" class="btn btn-outline-primary" value="Sortiraj">
                    </div>
                </form>
            </div>
        </div>


        <div class="col-3" style="margin-left: 65%;">
            <form method="GET" action="home.php" class="d-flex">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
    <sectoin class="sec">
        <div class="products">
            <!-- Start Card -->

            <?php
            foreach ($products as $product) { ?>
                <div class="card">
                    <div class="img"><img style="width: 100%;" src="..//img/<?php echo $product["image"] ?>" alt=""></div>

                    <div class="title"><?php echo $product["name"] ?></div>
                    <div class="box">
                        <div class="price"><?php echo $product["price"] ?>$</div>
                        <?php if (isset($_SESSION["user"])) { ?>
                            <a href="singleProduct.php?id=<?php echo $product["id"] ?>"><button class="btn" name="buy-now">Buy Now</button></a>
                        <?php } else {
                            "";
                        } ?>
                    </div>
                </div>

            <?php  } ?>
            <!-- End Card -->

        </div>
    </sectoin>

    <footer>
        <p>Copyrights at <a href="">Shop</a></p>
    </footer>


</body>

</html>