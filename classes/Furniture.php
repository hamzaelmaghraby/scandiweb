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
        parent::__construct($args['sku'],$args['name'],$args['price'],$args['type']);
        $this->height = $args['height'];
        $this->width = $args['width'];
        $this->length = $args['length'];
    }

    public function save()
    {
        $productid =  $this->createProduct();
        if($productid){
            $sql = "INSERT INTO furniture (height,width,length, productID)";
            $sql .= "VALUES ('$this->height','$this->width','$this->length', '$productid')";
            $result = self::$database->query($sql);
            if($result){
                echo("furniture created successfully");
            }else{
                echo("error");
            }
            return $result;
        }
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