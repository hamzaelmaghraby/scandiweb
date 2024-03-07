<?php

namespace Site\Classes;
use Site\Classes\Product;

class Book extends Product
{
    public $weight;

    public function __construct($args=[])
    {
        $this->sku = $args['sku'];
        $this->name = $args['name'];
        $this->price = $args['price'];
        $this->type = $args['type'];
        $this->weight = $args['weight'];
    }
    
    public function save()
    {
        $productid =  $this->createProduct();
        $sql = "INSERT INTO book (weight, productID) 
                VALUES ('{$this->weight}', '{$productid}')";
        $result = self::$database->query($sql);
        return $result;
    }

    public function view()
    {
        echo $this->sku."<br>";
        echo $this->name."<br>";
        echo $this->price." $ <br>";
        echo "Weight:". $this->weight."<br>";
    }
}
?>