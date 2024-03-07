<?php

use Site\Classes\Product;
use Site\Classes\Dvd;
use Site\Classes\Book;
use Site\Classes\Furniture;

require_once('../vendor/autoload.php');
include_once('../database/credentials.php');

$database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
Product::set_database($database);


function createProduct($args=[])
{
    $p = "Site\Classes\\".$args['type'];
    $d = new $p($args);
    $result = $d -> save();
    
}

function viewProducts()
{   
    $result = Product::selectAll();
    echo '<div class = "container-fluid">';
    echo '<div class = "row">';
    while($row = $result->fetch_assoc()) {
        echo '<div class="col-md-2 border border-dark" align="center" style="margin-bottom:20px;">';
        echo '<input type="checkbox" name="product[]" value="'.$row["id"].'" class="delete-checkbox">';
        $p = "Site\Classes\\".$row['type'];
        $d = new $p($row);
        $d -> view();
        echo '</div>';
        echo '<div class="col-md-1"></div>';
    }
    echo '</div>';
    echo '</div>';
}

if(isset($_GET['sku'])){
    $sku=$_GET['sku'];
    $sql = "SELECT * FROM Products Where Products.sku = '".$sku."' ";
    $result = $database->query($sql);

    if ($result->num_rows > 0){
        echo "0";
    }
    else{
         echo "1";
    }
}

if(isset($_POST['saveproduct'])){
    $args=[];
    $args['sku'] = $_POST['sku'] ?? NULL;
    $args['name'] = $_POST['name'] ?? NULL;
    $args['price'] = $_POST['price'] ?? NULL;
    $args['type'] = $_POST['type'];
    $args['size'] = $_POST['size'] ?? NULL;
    $args['weight'] = $_POST['weight'] ?? NULL;
    $args['height'] = $_POST['height'] ?? NULL;
    $args['width'] = $_POST['width'] ?? NULL;
    $args['length'] = $_POST['length'] ?? NULL;
    createProduct($args);
}

if(isset($_POST['deleteproduct'])){
    foreach ($_POST['option_id'] as $option_id) {
        $sql1 = "DELETE d, b, f  
              FROM Products p
              LEFT JOIN book b ON p.id = b.productID
              LEFT JOIN dvd  d ON p.id = d.productID
              LEFT JOIN furniture  f ON p.id = f.productID
              WHERE p.id = $option_id ";

              $sql2 = "DELETE p  
              FROM Products p
              LEFT JOIN book b ON p.id = b.productID
              LEFT JOIN dvd  d ON p.id = d.productID
              LEFT JOIN furniture  f ON p.id = f.productID
              WHERE p.id = $option_id ";

        if($database->query($sql1) == TRUE){
            $database->query($sql2);
        }
	}
}
if(isset($_GET['products'])){
    $result = Product::selectAll();
    echo '<div class = "container-fluid">';
    echo '<div class = "row">';
    while($row = $result->fetch_assoc()) {
        echo '<div class="col-md-2 border border-dark" align="center" style="margin-bottom:20px;">';
        echo '<input type="checkbox" name="product[]" value="'.$row["id"].'" class="delete-checkbox">';
        $p = "Site\Classes\\".$row['type'];
        $d = new $p($row);
        $d -> view();
        echo '</div>';
        echo '<div class="col-md-1"></div>';
    }
    echo '</div>';
    echo '</div>';
}
?>