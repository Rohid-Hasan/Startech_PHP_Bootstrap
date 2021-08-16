
<?php 
$titleErr = $imagePathErr = $priceErr = $categoryErr = $highlight1Err = $quantityErr = "";
$title = $imagePath = $price = $category = $highlight1 = $quantity = "";

$insertOrNotChecker = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["title"])) {
    $titleErr = "title is required!";
  } else {
    $title = $_POST["title"];
  }

  if (empty($_POST["imagePath"])) {
    $imagePathErr = "imagePath can not be empty";
  } else {
    $imagePath = $_POST["imagePath"];
  }

  if (empty($_POST["price"])) {
    $priceErr = "price can not be empty";
  } else {
    $price = $_POST["price"];
  }

  if (empty($_POST["category"])) {
    $categoryErr = "category can not be empty";
  } else {
    $category = $_POST["category"];
  }

  if (empty($_POST["highlight1"])) {
    $highlight1Err = "Please Atleast insert one highlight";
  } else {
    $highlight1 = $_POST["highlight1"];
  }


  if (empty($_POST["quantity"])) {
    $quantityErr = "quantity can not be empty";
  } else {
    if ($_POST["quantity"] < 0) {
      $quantityErr = "Quantity can not be negative";
    } else {
      $quantity = $_POST["quantity"];
    }
  }


  if (!empty($_POST["title"]) && !empty($_POST["imagePath"]) && !empty($_POST["price"]) && !empty($_POST["category"]) && !empty($_POST["highlight1"])) {
    $conn = new mysqli('localhost', 'root', '', 'startech');

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

 /*    $sql = "insert into product(title,imagePath,category,price,quantity, highlight1,highlight2,highlight3) values( '{$_POST["title"]}', '{$_POST["imagePath"]}', '{$_POST["category"]}', '{$_POST["price"]}', '{$_POST["quantity"]}','{$_POST["highlight1"]}', '{$_POST["highlight2"]}', '{$_POST["highlight3"]}') where id='{$_POST["id"]}'"; */
    if(isset($_POST['id'])){
      $sql = "update product set title= '{$_POST["title"]}',imagePath = '{$_POST["imagePath"]}',category = '{$_POST["category"]}', price ='{$_POST["price"]}', quantity =  '{$_POST["quantity"]}', highlight1 = '{$_POST["highlight1"]}',highlight2 = '{$_POST["highlight2"]}', highlight3 ='{$_POST["highlight3"]}' where id ='{$_POST["id"]}'";
    }else{
      $sql = "insert into product(title,imagePath,category,price,quantity, highlight1,highlight2,highlight3) values( '{$_POST["title"]}', '{$_POST["imagePath"]}', '{$_POST["category"]}', '{$_POST["quantity"]}', '{$_POST["price"]}', '{$_POST["highlight1"]}', '{$_POST["highlight2"]}', '{$_POST["highlight3"]}')";
    }
   
    if ($conn->query($sql) === TRUE) {
      $insertOrNotChecker = "record created successfully";
    } else {
      $insertOrNotChecker = "Error: Can not insert";
    }
  }
}
