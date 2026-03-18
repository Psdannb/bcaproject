<?php
include "../dbconnection.php";
include "header.php";
include "menu.php";
$productid = $_GET['id'];
$selectsql = "SELECT * FROM products WHERE id='$productid'";
$response = mysqli_query($conn, $selectsql);
if ($response->num_rows > 0) {
    foreach ($response as $data) {
        // print_r($data);
        $productname = $data['productname'];
        $discountpercent = $data['discountpercent'];
        $originalprice = $data['originalprice'];
        $discountprice = $data['discountprice'];
    }
}
?>
<div class="addproduct">
    <form id="entryform">
        <input type="hidden" value="<?php echo $productid;?>" name="productid">


        <h2>Edit Product FOrm</h2>
        <label>Product Name</label>
        <input type="text" placeholder="Enter the product name" name="productname"
            value="<?php echo   $productname; ?>">
        <label>Discount Percent</label>
        <input type="number" placeholder="Enter discount percent" name="discountpercent"
            value="<?php echo   $discountpercent; ?>">

        <label>Original Price</label>
        <input type="number" placeholder="Enter original Price" name="originalprice"
            value="<?php echo      $originalprice; ?>">

        <label>Discount Price</label>
        <input type="number" placeholder="Enter Discount Price" name="discountprice"
            value="<?php echo  $discountprice; ?>">
        <input type="submit" value="Update Product">
    </form>
</div>
<script>
$(document).ready(function() {
    $("#entryform").on("submit", function(event) {
        event.preventDefault();
        let userdata = new FormData(this);
        // console.log(userdata);
        $.ajax({
            url: "../functions/updateproduct.php",
            type: 'POST',
            data: userdata,
            processData: false,
            contentType: false,
            success: function(response) {
                alert(response);
                location.href = "manageproduct.php";
            },
            error: function() {
                alert("Error occured");
            }
        })
    })
})
</script>

<style>
.addproduct {
    height: 100vh;
    width: 100vw;
    display: flex;
    justify-content: center;
    align-items: center;
}

#entryform {
    min-width: 50%;
}
</style>
<?php
include "footer.php";
?>