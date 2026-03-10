<?php
include "dbconnection.php";
$seekProductsSql="SELECT * FROM products";
$productresponse= mysqli_query($conn,$seekProductsSql);
// print_r($productresponse);
?>

<section id="products">
    <div class="product">
        <h3>Our Products</h3>
        <h1>Fresh From The Farm</h1>
        <p>Handpicked selection of premium quality fruits</p>
    </div>
    <!-- .......................................................
 Section For Products
........................................................... -->
    <div class="main">
        <!-- Card 1 -->

        <?php
if($productresponse->num_rows>0){
    foreach($productresponse as $product){
        // print_r($product);
        $productname=$product['productname'];
        $discountpercent=$product['discountpercent'];
        $originalprice=$product['originalprice'];
        $discountprice=$product['discountprice'];
?>
        <div class="t1">
            <div class="ts1">
                <p class="ps">-<?php echo  $discountpercent; ?>%</p>
            </div>
            <h1 class="image-apple">🍎</h1>
            <span class="organic">Organic</span>
            <h6><?php echo   $productname; ?></h6>
            <p>⭐⭐⭐⭐⭐ (4.5)</p>
            <div class="cross">
                <h2>Rs<?php echo  $originalprice; ?></h2>
                <h3>Rs <?php echo  $discountprice;?></h3>
            </div>
            <button class="add-cart">Add to Cart</button>
        </div>
        <?php
    }
}

?>


    </div>
</section>