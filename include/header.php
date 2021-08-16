<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Startech</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="../assests/CSS/style.css" />
  </head>
  <body>
    <div class="header">
      <div class="container">
        <div class="d-flex content">
          <img
            src="../assests/img/logo.png"
            class="img-fluid rounded brand-logo"
            alt="Brand Image"
          />
          <input
            type="text"
            class="form-control header-search"
            placeholder="Search"
            onkeyup="showResult(this.value)"
          />
          <button type="submit" class="btn btn-primary search-btn">
            <i class="fa fa-search"></i>
          </button>
          <i class="fa fa-shopping-cart"></i>
          <div class="offers">
            <a href="cart.php"><h5 class="font-weight-bold" style="margin-top:7px"> My Cart</h5></a>
          </div>
          <i class="fa fa-user"></i>
          <div class="user-account">
            <h5 class="font-weight-bold">Account</h5>
            <p><a href="#">Register</a> OR <a href="login.php">Log In</a></p>
          </div>
          <button class="btn btn-primary pc-builder">PC BUILDER</button>
        </div>
      </div>
    </div>



    <div id="search-result"> </div>





    <div class="menu">
      <div class="container">
        <nav class="navbar navbar-expand-sm justify-content-center">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="#" class="nav-link">Desktop</a>
            </li>
            <li class="nav-item">
              <a href="product-list.php?category=laptop" class="nav-link">Laptop</a>
            </li>
            <li class="nav-item dropdown">
              <a href="product-list.php?category=monitor" class="nav-link">Monitor</a>
              <ul class="dropdown-content">
                <li><a href="#">Benq</a></li>
                <li><a href="#">Asus</a></li>
                <li><a href="#">Asus</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Ram</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">SSD</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">HDD</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Wi-fi</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Cable</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Power Supply</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">TV</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>

  <script>   
  
  function showResult(str) {
    
  if (str.length==0) {
    document.getElementById("search-result").innerHTML="";
    document.getElementById("search-result").style.border="0px";
    return;
  }
  let xmlhttp=new XMLHttpRequest();
  xmlhttp.onload = function(){
        output = "";
        if(this.status == 200){
          console.log(this.responseText);
          const products = JSON.parse(this.responseText);
          for(let i in products){
            output += products[i].title;
          }

          document.getElementById('search-result').innerHTML = output;
        }
      }
  xmlhttp.open("GET","../Controller/livesearch.php?q="+str,true);
  xmlhttp.send();
}  
  
  </script>