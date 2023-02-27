<?php
session_start();
include_once "../DB/dbconnect.php";
include_once "../model/Products/Categories.php";
$conn = DB::getInstance();
$categorys = Category::getAllCategory($conn);

if (!isset($_SESSION['user'])) {
    // Ako korisnik nije prijavljen, preusmjeri ga na stranicu za prijavu
    header("Location: login.php");
    exit();
}

//Provera da li je admin
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


            <li><a href="adminRegister.php">Registar</a></li>
            <li><a href="admin.php">Home</a></li>
            <li><a href="logout.php">Logout</a></li>
            <div class="menu-btn">
                <i class="fa fa-bars"></i>
            </div>
    </nav>

    <section class="col-6 ">
        <div class="container text-center  mt-3 pt-5">
            <h2 class="form-weight-bold">Add Product</h2>
            <hr class="hr">
        </div>
        <div class="container text-center row justify-content-md-center">
            <form action="../controler/AdminController.php" class="row justify-content-md-center" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Product name">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" id="price" placeholder="Price">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" id="image" placeholder="Image">
                </div>
                <div class="mb-3">
                    <label for="quantety" class="form-label">Quantity</label>
                    <input type="text" class="form-control" name="quantity" id="quantety" placeholder="Quantity">
                </div>
                <div class="mb-3">
                    <label class="" for="category">Category</label>
                    <select class="form-select" name="category_id" id="category">

                        <?php
                        foreach ($categorys as $cat) { ?>
                            <option value="<?php echo $cat["id"] ?>"><?php echo $cat["name"] ?></option>

                        <?php } ?>


                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descritipon "></textarea>
                </div>

                <input type="submit" class="btn btn-success" name="add" id="login-btn" value="Add">
        </div>
        </form>
        </div>
    </section>



    <footer>
        <p>Copyrights at <a href="">Shop</a></p>
    </footer>


</body>

</html>