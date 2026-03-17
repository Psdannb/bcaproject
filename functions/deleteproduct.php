<?php
include "../dbconnection.php";
$productid = $_POST['id'];
$deleteproductsql = "DELETE FROM products WHERE id='$productid'";
if (mysqli_query($conn, $deleteproductsql)) {
    echo "Product deleted successfully";
} else {
    echo "Error deleting product: " . mysqli_error($conn);
}
?>