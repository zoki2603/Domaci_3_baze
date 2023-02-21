<?php
// include_once "../Products/Product.php";
class Cart
{
    public $products;

    public function __construct()
    {
        $this->products = array();
    }




    public function addProduct(Product $product, $quantity)
    {
        foreach ($this->products as $key => $p) {
            if ($p->id == $product->id) {
                $p->quantity += $quantity;
                return;
            }
        }
        $product->quantity = $quantity;
        $this->products[] = $product;
    }

    public function getProductById($id)
    {
        foreach ($this->products as $product) {
            if ($product->id == $id) {
                return $product;
            }
        }
        return null;
    }

    public function removeProduct($id)
    {
        foreach ($this->products as $key => $product) {
            if ($product->getId() == $id) {
                unset($this->products[$key]);
                break;
            }
        }
    }
    public  function getProductCount()
    {
        $count = 0;
        foreach ($this->products as $product) {
            $count += $product->getQuantity();
        }
        return $count;
    }

    public function getProducts()
    {
        return $this->products;
    }
    public function sumAll()
    {
        $totalSum = 0;
        foreach ($this->products as $product) {
            if (is_numeric($product->getQuantity())) {
                $totalSum += $product->getQuantity() * floatval($product->priceWithPDV());
            }
        }

        return number_format($totalSum, 2);
    }
    public static function emptyCart()
    {
        unset($_SESSION['cart']);
    }
}
