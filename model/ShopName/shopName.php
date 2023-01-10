<?php

class Store
{
    private int $id;
    private string $nameOfStore;
    private int $pib;

    public function __construct($id, $nameOfStore)
    {
        $this->id = $id;
        $this->nameOfStore = $nameOfStore;
    }
}
