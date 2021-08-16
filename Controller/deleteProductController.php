<?php
require_once '../Model/Product.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $id = $_POST["id"];

  $conn = new mysqli('localhost', 'root', '', 'startech');

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "select * from product where id = '{$id}'";
  $result = $conn->query($sql);

  $tempProduct = $result->fetch_assoc();

  $_SESSION["deletedId"]=$tempProduct["id"];
  $_SESSION["deletedTitle"] = $tempProduct["title"];
  $_SESSION["deletedImagePath"] = $tempProduct["imagePath"];
  $_SESSION["deletedPrice"] = $tempProduct["price"];
  $_SESSION["deletedQuantity"]=$tempProduct["quantity"];
  $_SESSION["deletedCategory"]=$tempProduct["category"];
  $_SESSION["highlight1"] = $tempProduct["highlight1"];
  $_SESSION["highlight2"] = $tempProduct["highlight2"];
  $_SESSION["highlight3"] = $tempProduct["highlight3"];

  $sql2 = "delete from product where id='{$id}'";

  if ($conn->query($sql2) === TRUE) {
    echo "delete successfully";
  } else {
    echo "Error: Can not delete";
  }
}
