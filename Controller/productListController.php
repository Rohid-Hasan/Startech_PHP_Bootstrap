<?php
require_once '../Model/Product.php';
        $category = $_GET["category"];
        $conn = new mysqli('localhost', 'root', '', 'startech');

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select * from product where category='{$category}'";
        $result = $conn->query($sql);

        $allProduct = array();

        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $keyFeatures = array($row["highlight1"],$row["highlight2"],$row["highlight3"]);
                $thisProduct = new Product($row["id"],$row["title"],$row["imagePath"],$row["price"],$row["category"],$keyFeatures);
                array_push($allProduct,$thisProduct);
            }
        }
