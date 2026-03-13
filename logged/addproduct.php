<?php
include "header.php";
?>
<div class="addproduct">
    <form id="entryform">
        <h2>Add Product FOrm</h2>
        <label>Product Name</label>
        <input type="text" placeholder="Enter the product name" name="productname">
        <label>Discount Percent</label>
        <input type="number" placeholder="Enter discount percent" name="discountpercent">

        <label>Original Price</label>
        <input type="number" placeholder="Enter original Price" name="originalprice">

        <label>Discount Price</label>
        <input type="number" placeholder="Enter Discount Price" name="discountprice">
        <input type="submit" value="Add Product">
    </form>
</div>
<script>
$(document).ready(function() {
    $("#entryform").on("submit", function(event) {
        event.preventDefault();
        let userdata = new FormData(this);
        // console.log(userdata);
        $.ajax({
            url: "functions/storeproduct.php",
            type: 'POST',
            data: userdata,
            processData: false,
            contentType: false,
            success: function(response) {
                alert(response);
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