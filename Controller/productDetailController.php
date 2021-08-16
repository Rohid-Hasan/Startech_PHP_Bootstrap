<?php 
require_once '../Model/Product.php';

$category = $_GET["category"];
$productId = $_GET["id"];
$conn = new mysqli('localhost', 'root', '', 'startech');

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "select * from product where id = '{$productId}'";
  $result = $conn->query($sql);

  $product ;
  if($result->num_rows>0){
      $tempProduct = $result->fetch_assoc();
      $keyFeatures = array($tempProduct["highlight1"],$tempProduct["highlight2"],$tempProduct["highlight3"]);
      $product = new Product($tempProduct["id"],$tempProduct["title"],$tempProduct["imagePath"], $tempProduct["price"],$tempProduct["category"],$keyFeatures);
  }