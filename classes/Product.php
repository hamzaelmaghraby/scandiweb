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

    public function createProduct(): string
    {
        $sql = "INSERT INTO Products (sku, name, price,type) 
                VALUES ('$this->sku', '$this->name', '$this->price', '$this->type')";
        $result = self::$database->query($sql);
        return mysqli_insert_id(self::$database);
    }

    static public function selectAll()
    {
        $sql = "SELECT 
                    Products.id, 
                    Products.sku, 
                    Products.name,
                    Products.price, 
                    Products.type, 
                    book.weight,
                    dvd.size, 
                    furniture.height,
                    furniture.width, 
                    furniture.length
                FROM 
                    Products
                LEFT JOIN 
                    book ON Products.id = book.productID
                LEFT JOIN 
                    dvd ON Products.id = dvd.productID
                LEFT JOIN 
                    furniture ON Products.id = furniture.productID
                ORDER BY 
                    Products.id DESC";
        $result = self::$database->query($sql);
        return $result;
    }
    
    public function save() {
    }

    public function view() {
    }
    
}
?>