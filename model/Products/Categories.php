<?php
class Category

{
    protected $categoryName;

    public function __construct()
    {
    }


    public function getCategoryName()
    {
        return $this->categoryName;
    }


    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
    }
}
