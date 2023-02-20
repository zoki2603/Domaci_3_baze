<?php
include_once "../controler/CartController.php";
include_once "../model/Cart/Cart.php";
// if (!session_start()) {
//     session_start();
// }



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
                        <th scope="col">Izbrisi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($cart->products as $key => $product) { ?>
                        <form action="../controler/CartController.php" method="POST">
                            <tr>
                                <th scope="row"><?php echo $key + 1 ?></th>
                                <td><?php echo $product->name; ?></td>
                                <td><?php echo $product->price; ?>$</td>
                                <td><?php echo $product->priceWithPDV() ?>$</td>
                                <td><?php echo $product->quantity; ?></td>
                                <td><?php echo $product->sumPrice() ?></td>

                                <input type="hidden" name="id" value="<?php echo $product->id ?>">

                                <td><input type="submit" name="removeProduct" value="Delete" class="btn btn-danger"></td>

                            </tr>

                        <?php } ?>
                        <tr>
                            <td colspan="3">Ukupna Cena: <?php echo $cart->sumAll() ?>$ </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <input style="margin-left: 83%; padding: 10px 40px;" type="submit" name="buy-all" class="btn btn-group-lg btn-outline-primary" value="Buy">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7"><input style="margin-left: 83%; padding: 10px 20px;" type="submit" name="remove_all" value="Delete All" class="btn btn-outline-danger"></td>
                        </tr>
                        </form>

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