<?php


$emailErr = $passErr = $firstNameErr = $lastNameErr ="";
$email = $password = $firstName = $lastName ="";
$exist ="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["firstName"])){
        $firstNameErr = "required!";
    }else{
        $firstName = $_POST["firstName"];
    }

    if(empty($_POST["lastName"])){
        $lastNameErr = "required!";
    }else{
        $lastName = $_POST["lastName"];
    }

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

    if(!empty($_POST["email"])&& !empty($_POST["password"]&&!empty($_POST["firstName"]&&!empty($_POST["lastName"])))){
        $conn = new mysqli('localhost', 'root', '', 'startech');

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "insert into user(firstName,lastName,email,password,type) values('{$_POST["firstName"]}','{$_POST["lastName"]}','{$_POST["email"]}','{$_POST["password"]}','buyer')";
        

        if ($conn->query($sql) === TRUE) {
            header("Location:index.php");
            exit();
          } else {
            $exist="Opps! I don't know why this error occourd but I Can not insert you as a user!";
        }
    }
}


