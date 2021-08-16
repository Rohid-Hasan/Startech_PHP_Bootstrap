<?php
require_once '../Model/Product.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $productId = $_POST["productId"];
    $conn = new mysqli('localhost', 'root', '', 'startech');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "select * from product where id = '{$productId}'";
    $result = $conn->query($sql);

    $myCartProduct = array();
    if ($result->num_rows > 0) {
        $tempProduct = $result->fetch_assoc();
        $thisProduct = new Product($tempProduct["id"], $tempProduct["title"], $tempProduct["imagePath"], $tempProduct["price"], $tempProduct["category"], array());
        if(isset($_SESSION["myCartProduct"])){
            foreach($_SESSION["myCartProduct"] as $product){
                array_push($myCartProduct,$product);
            }
        }
        array_push($myCartProduct,$thisProduct);
        $_SESSION["myCartProduct"] = $myCartProduct;
    } 



}
