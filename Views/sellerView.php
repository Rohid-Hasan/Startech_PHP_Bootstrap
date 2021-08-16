<?php include '../Controller/updateProductInDatabaseController.php' ?>

<?php include '../Controller/sellerViewController.php';
?>



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="../assests/CSS/product-list.css" />
<div class="container">
    <div class="row">
        <?php

        $n = count($allProduct);
        for ($i = 0; $i < $n; $i++) {
        ?>
            <div class="col-sm-3" style="margin-left: 1em;">
                <div class="card product-item">
                    <img src="<?php echo $allProduct[$i]->get_imagePath(); ?>" alt="Laptop picture" class="card-img-top img-fluid">
                    <div class="card-body">
                        <a href="#">
                            <h6 class="card-title" style="cursor: pointer;"><?php echo $allProduct[$i]->get_title(); ?></h6>
                        </a>
                        <ul>
                            <?php $thisKeyFeature = $allProduct[$i]->get_keyFeatures();
                            for ($x = 0; $x < 3; $x++) {
                            ?>
                                <li><?php echo $thisKeyFeature[$x]; ?></li>
                            <?php } ?>
                        </ul>
                        <hr>
                        <p class="price">$<?php echo  $allProduct[$i]->get_price(); ?></p>
                        <button class="btn btn-warning" onclick="updateProduct(<?php echo  $allProduct[$i]->get_id();  ?>)">Update Product</button>
                        <button class="btn btn-danger" onclick="deleteProduct(<?php echo  $allProduct[$i]->get_id();  ?>)">Delete Product</button>
                    </div>
                </div>
            </div>
        <?php } //for end
        ?>

        <button class="btn btn-info" onclick="reviveDeletedProduct()"> Get the Last deleted product</button>
        <button class="btn btn-success" style="margin-left:2em;"><a href="addProduct.php">Add Product</a></button>
        <?php if (isset($insertOrNotChecker)) { ?>
            <h1 style="color:red"><?php $insertOrNotChecker  ?></h1>
        <?php }  ?>


        <div class="container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="hidden" id="toggleForm">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" class="form-control" name="title">
                    <?php if (isset($titleErr)) { ?>
                        <p style="color: red;"><?php echo $titleErr ?></p>
                    <?php   } ?>
                </div>
                <div class="form-group">
                    <label for="imagePath">Image Path</label>
                    <input type="text" id="imagePath" class="form-control" name="imagePath">
                    <?php if (isset($imagePathErr)) { ?>
                        <p style="color: red;"><?php echo $imagePathErr ?></p>
                    <?php   } ?>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" id="price" class="form-control" name="price">
                    <?php if (isset($priceErr)) { ?>
                        <p style="color: red;"><?php echo $priceErr ?></p>
                    <?php   } ?>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" id="category" class="form-control" name="category">
                    <?php if (isset($categoryErr)) { ?>
                        <p style="color: red;"><?php echo $categoryErr ?></p>
                    <?php   } ?>
                </div>
                <div class="form-group">
                    <label for="=highlight1">HighLight Feature 1 </label>
                    <input type="text" id="highlight1" class="form-control" name="highlight1">
                    <?php if (isset($highlight1Err)) { ?>
                        <p style="color: red;"><?php echo $highlight1Err ?></p>
                    <?php   } ?>
                </div>
                <div class="form-group">
                    <label for="highlight2">HighLight Feature 2</label>
                    <input type="text" id="highlight2" class="form-control" name="highlight2">
                </div>
                <div class="form-group">
                    <label for="highlight3">HighLight Feature 3</label>
                    <input type="text" id="highlight3" class="form-control" name="highlight3">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" id="quantity" class="form-control" name="quantity">
                    <?php if (isset($quantityErr)) { ?>
                        <p style="color: red;"><?php echo $quantityErr ?></p>
                    <?php   } ?>
                </div>
                <div class="form-group">
                    <label for="id">id</label>
                    <input type="text" id="productId" class="form-control" name="id">
                </div>
                <button type="submit" class="btn btn-warning" id="buttonForUpdateDelete">Update Product To Database</button>
            </form>
        </div>

        <div id="demo" style="text-align: center; font-weight:bold; color:green"></div>

        <script>
            function updateProduct(id) {
                const params = "id=" + id;

                let xhr = new XMLHttpRequest();
                xhr.open('POST', '../Controller/updateProductController.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');



                xhr.send(params);

                xhr.onload = function() {
                    output = "";
                    console.log("i am inside onload funciton");
                    if (this.status == 200) {
                        console.log(this.responseText);
                        const product = JSON.parse(this.responseText);
                        console.log(product);
                        const title = product[0].title;
                        const imagePath = product[0].imagePath;
                        const price = product[0].price;
                        const quantity = product[0].quantity;
                        const category = product[0].category;
                        const highlight1 = product[0].highlight1;
                        const highlight2 = product[0].highlight2;
                        const highlight3 = product[0].highlight3;
                        const id = product[0].id;

                        document.getElementById('title').value = title;
                        document.getElementById('imagePath').value = imagePath;
                        document.getElementById('price').value = price;
                        document.getElementById('category').value = category;
                        document.getElementById('quantity').value = quantity;
                        document.getElementById("highlight1").value = highlight1;
                        document.getElementById('highlight2').value = highlight2;
                        document.getElementById('highlight3').value = highlight3;
                        document.getElementById('productId').value = id;

                        
                        document.getElementById('toggleForm').className = 'block';
                    }
                }
            }



            function deleteProduct(id) {
                const params = "id=" + id;

                let xhr = new XMLHttpRequest();
                xhr.open('POST', '../Controller/deleteProductController.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                xhr.onload = function(){
                    console.log(this.responseText);
                }

                xhr.send(params);
            }


            function reviveDeletedProduct(){
                let xhr = new XMLHttpRequest();
                xhr.open('GET', '../Controller/reviveProductController.php', true);

                xhr.send();

                xhr.onload = function() {
                    if (this.status == 200) {
                        let data = JSON.parse(this.responseText);
                        document.getElementById("demo").innerHTML = `<ul> 
                                                                        <li>ID : ${data[0]}</li>
                                                                        <li> Title: ${data[1]}</li>
                                                                        <li>Image path : ${data[2]}</li>
                                                                        <li>price : ${data[3]}</li>
                                                                        <li>quantity : ${data[4]}</li>
                                                                        <li>category: ${data[5]}</li>
                                                                        <li>Feature : ${data[6]}</li>
                                                                        <li>Feature : ${data[7]}</li>
                                                                        <li>Feature : ${data[8]}</li>
                                                                    </ul>`;
                    }
                }
            }
        </script>

    </div>
</div>