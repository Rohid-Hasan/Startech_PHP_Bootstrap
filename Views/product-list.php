<?php include "../include/header.php"; ?>

<link rel="stylesheet" href="../assests/CSS/product-list.css">

<!--     product detail start
 -->

<div class="full-wrapper">
  <div class="container product-list">
    <div class="row">


      <?php include '../include/customizabols.php' ?>


      <div class="col-sm-9">
        <div class="top-banner">
          <div class="justify-content-between d-flex">
            <p>Asus</p>
            <div class="d-flex sort-by">
              <label for="sort-by">Sort By: </label>
              <select name="sort-by" id="sort-by" class="form-control form-control-sm">
                <option value="low to high">Low to high</option>
                <option value="low to high">Low to high</option>
                <option value="low to high">Low to high</option>
              </select>
            </div>
          </div>
        </div>


        <?php include '../Controller/productListController.php'; ?>


        <div class="row">
          <?php

          $n = count($allProduct);
          for ($i = 0; $i < $n; $i++) {
          ?>
            <div class="col-sm-3" style="margin-left: 1em;">
              <div class="card product-item">
                <img src="<?php echo $allProduct[$i]->get_imagePath(); ?>" alt="Laptop picture" class="card-img-top img-fluid">
                <div class="card-body">
                  <?php $thisProductUrl = "product-detail.php?category={$category}&id={$allProduct[$i]->get_id()}"; ?>
                  <a href="<?php echo $thisProductUrl ?>">
                    <h6 class="card-title" style="cursor: pointer;"><?php echo $allProduct[$i]->get_title(); ?></h6>
                  </a>
                  <ul>
                      <?php $thisKeyFeature = $allProduct[$i]->get_keyFeatures();
                            for($x=0;$x<3;$x++){
                      ?>
                          <li><?php echo $thisKeyFeature[$x]; ?></li>
                      <?php } ?>
                  </ul>
                  <hr>
                  <p class="price">$<?php echo  $allProduct[$i]->get_price(); ?></p>
                  <form action="cart.php" method="POST">
                    <input type="text" value="<?php echo  $allProduct[$i]->get_id(); ?>" style="display: none;" name="productId">
                    <button class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Buy Now</button>
                  </form>
                  <button class="btn btn-secondary">Add To Compare</button>
                </div>
              </div>
            </div>
          <?php } //for end
          ?>
        </div>
      </div>
    </div>
  </div>
  <?php include "../include/footer.php" ?>