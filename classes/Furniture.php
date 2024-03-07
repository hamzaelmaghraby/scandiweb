<?php

namespace Site\Classes;
use Site\Classes\Product;

class Furniture extends Product
{
    public $height;
    public $width;
    public $length;

    public function __construct($args=[])
    {
        $this->sku = $args['sku'];
        $this->name = $args['name'];
        $this->price = $args['price'];
        $this->type = $args['type'];
        $this->height = $args['height'];
        $this->width = $args['width'];
        $this->length = $args['length'];
    }

    public function save()
    {
        $productid =  $this->createProduct();
        $sql = "INSERT INTO furniture (height,width,length, productID)
                VALUES ('$this->height','$this->width','$this->length', '$productid')";
        $result = self::$database->query($sql);
        return $result;

    }


    public function view( )
    {
        echo $this->sku."<br>";
        echo $this->name."<br>";
        echo $this->price." $ <br>";
        echo "Dimensions:" . $this->height."x". $this->width."x". $this->length."<br>";
  
    }
}
?>