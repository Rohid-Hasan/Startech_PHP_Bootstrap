<?php


$emailErr = $passErr ="";
$email = $password = "";
$exist ="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["email"])){
        $emailErr = "email or phone number is required!";
    }else{
        $email = $_POST["email"];
    }

    if(empty($_POST["password"])){
        $passErr ="password can not be empty";
    }else{
        $password = $_POST["password"];
    }

    if(!empty($_POST["email"])&& !empty($_POST["password"])){
        $conn = new mysqli('localhost', 'root', '', 'startech');

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select * from user where email = '{$_POST["email"]}'";
        $result  = $conn->query($sql);

        if ($result !== false && $result->num_rows > 0){
            $user = $result->fetch_assoc();
            if($user["password"]==$_POST["password"]){
                if($user["type"]=="seller"){
                    header("Location: views/seller-view.php");
                    exit();
                }
                exit();
            }else{
                $exist = "password does not match";
            }
        }else{
            $exist= "email does not exist";
        }
    }
}


