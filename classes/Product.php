<?php

namespace Site\Classes;

class Product
{
    public $sku;
    public $name;
    public $price;
    public $type;
    static protected $database;

    static public function set_database($database)
    {
        self::$database = $database;
    }

    public function __construct($sku,$name,$price,$type)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->type = $type;
    }
    
    public function createProduct(): string
    {
        $sql = "INSERT INTO Products (sku, name, price,type)" ;
        $sql .= "VALUES ('$this->sku', '$this->name', '$this->price', '$this->type')";
        $result = self::$database->query($sql);
        if($result){
            return mysqli_insert_id(self::$database);
        } else {
            echo("Database query failed");
        }
    }

    static public function selectAll()
    {
        $sql = "SELECT Products.id, Products.sku, Products.name,";
        $sql.= " Products.price, Products.type, book.weight,";
        $sql.= " dvd.size, furniture.height,";
        $sql.= " furniture.width, furniture.length";
        $sql.= " FROM Products";
        $sql.= " LEFT JOIN book ON Products.id = book.productID";
        $sql.= " LEFT JOIN dvd ON Products.id = dvd.productID";
        $sql.= " LEFT JOIN furniture ON Products.id = furniture.productID";
        $sql.= " ORDER BY Products.id DESC";
        $result = self::$database->query($sql);
        return $result;
    }

}
?>