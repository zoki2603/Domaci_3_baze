<?php
session_start();
include_once "../loaddata.php";

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
            if (!isset($_SESSION["logovani-korinik"])) { ?>
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
    <h1 class="pheading">SHOPING CART</h1>

    <sectoin class="sec">
        <div class="products">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Naziv</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Cena sa PDV-om</th>
                        <th scope="col">Kolicina</th>
                        <th scope="col">Ukupna cena</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($cart->products as $key => $product) { ?>
                        <form action="" method="POST">
                            <tr>
                                <th scope="row"><?php echo $key + 1 ?></th>
                                <td><?php echo $product->productName; ?></td>
                                <td><?php echo $product->price; ?>$</td>
                                <td><?php echo $product->priceWithPDV() ?>$</td>
                                <td><?php echo $product->quantity; ?></td>
                                <td><?php echo $product->priceWithPDV() * $product->quantity ?></td>
                            </tr>

                        <?php } ?>
                        <tr>
                            <td colspan="3">Ukupna Cena: <?php echo $cart->sumAll() ?>$ </td>
                        </tr>
                        <tr>
                            <td colspan="8" style="color: red;font-size: large;text-align: center;"> <?php echo strtoupper($product->__toString()) ?></td>

                        </tr>
                        </form>
                        <tr>
                            <td>
                            <td colspan="8" style="color: red;font-size: large;text-align: center;"> <?php echo strtoupper($customer->__toString()) ?></td>
                            </td>
                        </tr>
                        </tr>
                </tbody>
            </table>

        </div>
    </sectoin>

    <footer>
        <p>Copyrights at <a href="">Shop</a></p>
    </footer>


</body>

</html>