<?php
  include '../include/header.php';
?>

<?php
  include '../Controller/productDetailController.php';
    ?>
 <link rel="stylesheet" href="../assests//CSS/product-detail.css">
 <script src="../assests/JS/script.js"></script>

  <?php if(isset($product)){ ?>
    <div class="container">
      <div class="rounded-div">
        <div class="float-left">
          <div class="d-flex">
            <p>0 Reviews</p>
            <p>0 Answered Question (s)</p>
            <p id="share-p-last">Share <i class="fa fa-facebook"></i></p>
          </div>
        </div>
        <div class="float-right">
          <div class="d-flex">
            <a href="#">&#128514;Save</a>
            <a href="#">&#128517;Add To Compare</a>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row deatil-start" style="width: 100%">
        <div class="col-md-5">
          <img
            src="<?php echo  $product->get_imagePath();?>"
            alt="Macbook Image"
            class="img-fluid"
          />
        </div>
        <div class="col-md-7">
          <h4>
           <?php echo $product->get_title();  ?> 
          </h4>
          <div class="d-flex rounded-p">
            <p>price: <?php echo $product->get_price();  ?> </p>
            <p>Regular price:$110,000</p>
            <p>Status:In Stock</p>
            <p>Product Code: <?php echo $product->get_id();  ?> </p>
            <p>Brand:Apple</p>
          </div>
          <p>Key Feature</p>
          <div class="key-feature">
              <?php $features = $product->get_keyFeatures();
                for($i=0;$i<3;$i++){
              ?>
                  <p><?php echo $features[$i]; ?></p>
              <?php } ?>
          </div>
          <p>Payment Options</p>
          <div class="payment-wrapper d-flex">
            <div class="single-payment d-flex">
              <input
                type="radio"
                name="payment-option"
                id="full-payment"
                value="full"
              />
              <label for="full-payment" class="form-control"
                ><div class="payment-div">
                  <p class="font-weight-bold">$<?php echo $product->get_price();  ?></p>
                  <p>cash discount price</p>
                  <p>online / cash payment</p>
                </div>
              </label>
            </div>
            <div class="single-payment d-flex">
              <input
                type="radio"
                name="payment-option"
                id="monthly-payment"
                value="monthly"
              />
              <label for="monthly-payment" class="form-control"
                ><div class="payment-div">
                  <p class="font-weight-bold">$500</p>
                  <p>Regular Price: $11,700</p>
                  <p>0% EMI on 6 months</p>
                </div>
              </label>
            </div>
          </div>
          <div class="d-flex quantity-section">
            <div class="quantity d-flex">
             <button onclick="decreseQuantity()">-</button>
              <p id="quantity"></p>
              <button onclick="addQuantity()">+</button>
            </div>
            <button class="btn btn-primary buy-now">Buy Now</button>
          </div>
        </div>
      </div>
    </div>
    <div class="full-detail-wrapper">
      <div class="container detail-specification" >
        <div class="details" >
          <table class="table">
            <tbody>
              <tr>
                <td>Processor</td>
                <td>core i10 30core 60threads cpu</td>
              </tr>
              <tr>
                <td>Processor</td>
                <td>Apple M1 chip with 8-core CPU and 7-core GPU</td>
              </tr>
              <tr>
                <td>Processor</td>
                <td>Apple M1 chip with 8-core CPU and 7-core GPU</td>
              </tr>
              <tr>
                <td>Processor</td>
                <td>Apple M1 chip with 8-core CPU and 7-core GPU</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  <?php }else{ ?>
      <div class="container">
        <h1>Oops! Please check your Url</h1>
      </div>
 <?php } ?>

<?php
  include '../include/footer.php';?>




