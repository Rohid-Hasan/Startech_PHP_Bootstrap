<?php

$q=$_GET["q"];

$conn = mysqli_connect('localhost','root','','startech');

$query = "select * from product where title LIKE '{$q}%'";


$result = mysqli_query($conn, $query);


$users = mysqli_fetch_all($result,MYSQLI_ASSOC);

echo json_encode($users);
