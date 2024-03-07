<?php

namespace Site\Classes;
use Site\Classes\Product;

class Dvd extends Product
{
    public $size;

    public function __construct($args=[])
    {
        $this->sku = $args['sku'];
        $this->name = $args['name'];
        $this->price = $args['price'];
        $this->type = $args['type'];
        $this->size = $args['size'];
    }

    public function save()
    {
        $productid =  $this->createProduct();
        $sql = "INSERT INTO dvd (size, productID) 
                VALUES ('$this->size', '$productid')";
        $result = self::$database->query($sql);
        return $result;
    }

    public function view()
    {
        echo $this->sku."<br>";
        echo $this->name."<br>";
        echo $this->price."$ <br>";
        echo "Size:".$this->size."<br>";
    }
}
?>