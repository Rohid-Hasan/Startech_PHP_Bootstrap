<?php include '../Controller/cartController.php' ?>
<?php include '../include/header.php'; ?>

<link rel="stylesheet" href="../assests/CSS/style.css">
<link rel="stylesheet" href="../assests/CSS/cart.css">


<div class="container">
    <div class="cart-content">
        <h2 class="display-4 mb-5 mt-2">Shopping cart</h2>
        <?php
        if(isset($_SESSION["myCartProduct"])) { ?>
            <div class="cart-item-heading">
                <div class="d-flex">
                    <p class="iamge">Image</p>
                    <p class="font-weight-bold product-name">product name</p>
                    <p class="product-quantity"> Quantity</p>
                    <p class="product-unit-price">unit price</p>
                    <p class="product-total-price">total</p>
                </div>
            </div>
            <?php
            $totalPrice = 0;
            foreach ($_SESSION["myCartProduct"] as $myItems) {
            ?>
                <div class="single-item">
                    <div class="d-flex">
                        <img src="<?php echo $myItems->get_imagePath() ?>" alt="product img" class="img-fluid" style="max-width: 50px;">
                        <p class="font-weight-bold product-name"><?php echo  $myItems->get_title();  ?></p>
                        <p class="product-quantity"> 1 </p>
                        <p class="product-unit-price"><?php echo  $myItems->get_price(); ?></p>
                        <p class="font-weight-bold product-total-price"><?php echo  $myItems->get_price(); ?></p>
                    </div>
                </div>
            <?php
                $totalPrice = $totalPrice +  $myItems->get_price();
            } ?>



            <hr>
            <div class="sub-total" style="display: block; height:15em">
                <div class="float-right">
                    <h3 class="font-weight-bold">Sub Total <?php echo $totalPrice ?></h3>
                    <hr>
                    <h3 class="font-weight-bold">Total <?php echo $totalPrice ?></h3>
                </div>
            </div>

        <?php
        } else { ?>
            <h3 class="font-weight-bold mb-5">Oops! No Item in your Cart</h3>
        <?php }

        ?>
    </div>
</div>

<?php include '../include/footer.php'; ?>