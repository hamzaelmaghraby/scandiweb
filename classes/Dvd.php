<?php

namespace Site\Classes;
use Site\Classes\Product;

class Dvd extends Product
{
    public $size;

    public function __construct($args=[])
    {
        parent::__construct($args['sku'],$args['name'],$args['price'],$args['type']);
        $this->size = $args['size'];
    }

    public function save()
    {
        $productid =  $this->createProduct();
        if($productid){
            $sql = "INSERT INTO dvd (size, productID)";
            $sql .= "VALUES ('$this->size', '$productid')";
            $result = self::$database->query($sql);
            if($result){
                echo("Dvd created successfully");
            }else{
                echo("error");
            }
            return $result;
        }
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