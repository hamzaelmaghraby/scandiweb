<?php

namespace Site\Classes;
use Site\Classes\Product;

class Book extends Product
{
    public $weight;

    public function __construct($args=[])
    {
        parent::__construct($args['sku'],$args['name'],$args['price'],$args['type']);
        $this->weight = $args['weight'];
    }
    
    public function save()
    {
        $productid =  $this->createProduct();
        if($productid){
            $sql = "INSERT INTO book (weight, productID)";
            $sql .= "VALUES ('$this->weight', '$productid')";
            $result = self::$database->query($sql);
            if($result){
                echo("Book created successfully");
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
        echo $this->price." $ <br>";
        echo "Weight:". $this->weight."<br>";
    }
}
?>