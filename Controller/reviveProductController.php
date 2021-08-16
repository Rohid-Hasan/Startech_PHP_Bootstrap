<?php
require_once '../Model/Product.php';
session_start();
if (isset($_SESSION["deletedTitle"])) {
  $id = $_SESSION["deletedId"];
  $title = $_SESSION["deletedTitle"];
  $imagePath = $_SESSION["deletedImagePath"];
  $price = $_SESSION["deletedPrice"];
  $quantity = $_SESSION["deletedQuantity"];
  $category = $_SESSION["deletedCategory"];
  $highlight1  = $_SESSION["highlight1"];
  $highlight2 = $_SESSION["highlight2"];
  $highlight3= $_SESSION["highlight3"];

  $data = array($id,$title,$imagePath,$price,$quantity,$category,$highlight1,$highlight2,$highlight3);

  echo json_encode($data);;

}
