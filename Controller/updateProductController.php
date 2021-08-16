<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $id = $_POST['id'];
  $conn = mysqli_connect('localhost','root','','startech');

  $query = "select * from product where id = '{$id}'";
  
  
  $result = mysqli_query($conn, $query);
  
  
  $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
  
  echo json_encode($users);
}

