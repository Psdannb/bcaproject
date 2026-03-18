<?php
include "../dbconnection.php";
// print_r($_POST);
// die();
$productid = $_POST['productid'];
$productname = $_POST['productname'];
$discountpercent = $_POST['discountpercent'];
$originalprice = $_POST['originalprice'];
$discountprice = $_POST['discountprice'];
$updatesql = "UPDATE products SET productname='$productname',discountpercent	='$discountpercent',originalprice='$originalprice',discountprice='$discountprice' WHERE id ='$productid'";
$response = mysqli_query($conn, $updatesql);
if ($response) {
    echo "Product Updated sucessfully";
} else {
    echo "failed to update product";
}