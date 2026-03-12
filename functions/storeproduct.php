<?php
include "../dbconnection.php";
// print_r($_POST);
$productname=$_POST['productname'];
$discountpercent=$_POST['discountpercent'];
$originalprice=$_POST['originalprice'];
$discountprice=$_POST['discountprice'];
$insertsql="INSERT INTO products(productname,discountpercent,originalprice,discountprice) VALUES('$productname','$discountpercent','$originalprice','$discountprice')";
$response =mysqli_query($conn,$insertsql);
if($response){
    echo"Product Added sucessfully";
}
else{
    echo "failed to add product";
}
?>