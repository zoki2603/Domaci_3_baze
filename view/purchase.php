<?php

include_once "../DB/dbconnect.php";
include_once "../controler/CartController.php";
include_once "../model/Cart/Cart.php";
include_once "../model/User/Customer.php";

$conn = DB::getInstance();
$allUsers =  Customer::getAllUsers($conn);
$allPurchase = Product::getAllPurchase($conn);
if (!isset($_SESSION['user'])) {
    // Ako korisnik nije prijavljen, preusmjeri ga na stranicu za prijavu
    header("Location: login.php");
    exit();
}
// var_dump($_SESSION['user']->getTip());
// die;
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

    <title>Shop</title>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <h1>SHOP</h1>
        </div>
        <ul class="menu">

            <li><a href="purchase.php">Purchase</a></li>
            <li><a href="">Registar</a></li>
            <li><a href="admin.php">Admin</a></li>
            <li><a href="logout.php">Logout</a></li>

            <!-- <li><a href="cartItems.php"><span></span><i class="fas fa-shopping-cart"></i></a></li>

            <div class="menu-btn">
                <i class="fa fa-bars"></i>
            </div> -->
    </nav>
    <h1 class="pheading">ORDERS</h1>

    <sectoin class="sec">
        <div class="products">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ime i Prezime Kupca</th>
                        <th scope="col">Datum Kupovine</th>
                        <th scope="col">Vidi Detalje Kupovine</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($allPurchase as $key => $purchase) { ?>
                        <tr>
                            <th scope="row"><?php echo $key + 1 ?></th>
                            <td><?php echo $purchase["name"] . ' ' . $purchase["lastname"]; ?></td>
                            <td><?php echo $purchase["date"] ?></td>
                            <input type="hidden" name="date" value="<?php echo $purchase["date"] ?>">
                            <td>
                                <a href="singlePurchase.php?id=<?php echo $purchase["id_user"] ?>&date=<?php echo $purchase["date"] ?>"> <input type="submit" name="onePurchase" class="btn btn-info" value="View Purchase"></a>
                                <input type="hidden" name="id_user" value="<?php echo $purchase["id_user"] ?>">
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </sectoin>

    <footer>
        <p>Copyrights at <a href="">Shop</a></p>
    </footer>


</body>

</html>