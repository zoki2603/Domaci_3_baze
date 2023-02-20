<?php
include_once "../DB/dbconnect.php";
include_once "../model/Products/Categories.php";
include_once "../model/Products/Product.php";

$conn = DB::getInstance();
if (isset($_POST["addCategory"])) {
    $name = $_POST["name"];
    if (!empty($name)) {
        Category::addCategory($name, $conn);
        header("Location:../view/admin.php");
        exit();
    }
}

if (isset($_POST["add"])) {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $imageName = $_FILES["image"];

    $quantity = $_POST["quantity"];
    $category = $_POST["category_id"];

    $description = $_POST["description"];

    if (!empty($name) && !empty($price) && !empty($imageName) && !empty($quantity) && !empty($category) && !empty($description)) {
        if ($_FILES["image"]["error"] === 4) {
            echo "Slika ne postoji";
        } else {
            $fileName =  $imageName["name"];
            $fileSize =  $imageName["size"];
            $tmpName =  $imageName["tmp_name"];

            $validImageExtension = ['jpg', 'jpeg', 'png', 'webp'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));
            if (!in_array($imageExtension, $validImageExtension)) {
                echo "Nije dobra extenzija slike";
            } elseif ($fileSize > 1000000) {
                echo "Slika je prevelika";
            } else {
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;

                move_uploaded_file($tmpName, '../img/' . $newImageName);
                Product::addProduct($name, $price, $newImageName, $description, $quantity, $category,  $conn);
                header("Location:../view/admin.php");
                exit();
            }
        }
    } else {
        echo "Sva polja moraju biti popunjena";
    }
}


if (isset($_POST["deleteProduct"])) {
    $id = $_POST["id"];

    if (is_numeric($id) || !empty($id)) {
        Product::deleteProduct($id, $conn);
        header("Location:../view/admin.php");
        exit();
    }
}

if (isset($_POST["updateProduct"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $imageName = $_FILES["image"];
    $quantity = $_POST["quantity"];
    $category = $_POST["category_id"];
    $description = $_POST["description"];

    // var_dump($name, $price, $quantity, $category, $description, $id);
    // die;
    if (!empty($name) && !empty($price) && !empty($imageName) && !empty($quantity) && !empty($category) && !empty($description)) {

        if ($_FILES["image"]["error"] === 4) {
            echo "Slika ne postoji";
        } else {
            $fileName =  $imageName["name"];
            $fileSize =  $imageName["size"];
            $tmpName =  $imageName["tmp_name"];

            $validImageExtension = ['jpg', 'jpeg', 'png', 'webp'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));
            if (!in_array($imageExtension, $validImageExtension)) {
                echo "Nije dobra extenzija slike";
            } elseif ($fileSize > 1000000) {
                echo "Slika je prevelika";
            } else {
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;

                move_uploaded_file($tmpName, '../img/' . $newImageName);
                Product::updateProduct($name, $price, $newImageName, $description, $quantity, $category, $id, $conn);
                header("Location:../view/admin.php");
                exit();
            }
        }
    }
}
