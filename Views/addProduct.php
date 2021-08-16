<?php include '../Controller/addProductController.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello Seller</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../">
</head>

<body>
    <div class="container">
        <?php if (isset($insertOrNotChecker)) { ?>
            <h1><?php $insertOrNotChecker  ?></h1>
        <?php }  ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="addProductForm" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" class="form-control" name="title">
                <?php if (isset($titleErr)) { ?>
                    <p style="color: red;"><?php echo $titleErr ?></p>
                <?php   } ?>
            </div>
            <div class="form-group">
                <label for="imagePath">Image Path</label>
                <input type="text" id="iamgePath" class="form-control" name="imagePath">
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
                <input type="number" id="qunatity" class="form-control" name="quantity">
                <?php if (isset($quantityErr)) { ?>
                    <p style="color: red;"><?php echo $quantityErr ?></p>
                <?php   } ?>
            </div>
            <button type="submit" class="btn btn-danger">Add Product To Database</button>
        </form>
    </div>


    <script>

function validateForm(){
    let title = document.forms['addProductForm']['title'].value;
    let imagePath = document.forms['addProductForm']['imagePath'].value;
    let price = document.forms['addProductForm']['price'].value;
    let category = document.forms['addProductForm']['category'].value;
    let highlight1 = document.forms['addProductForm']['highlight1'].value;
    let quantity = document.forms['addProductForm']['quantity'].value;
    if(title==""){
        alert("title can not be empty");
    }
    if(imagePath==""){
        alert("imagePath can not be empty");
    }
    if(price==""){
        alert("price can not be empty");
    }
    if(category==""){
        alert("category can not be empty");
    }
    if(quantity==""){
        alert("quantity can not be empty");
    }

}

                    
    </script>
</body>