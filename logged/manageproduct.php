<?php
include "header.php";
include "../dbconnection.php";
include "menu.php";
$seekproductssql="SELECT * FROM products";
$seekproductresult=mysqli_query($conn,$seekproductssql);
?>

<table>
    <thead>
        <th>SN</th>
        <th>Product Name</th>
        <th>Original Price</th>
        <th>Discount Percent</th>
        <th>Discount Price</th>
        <th>Actions</th>
    </thead>

    <?php
if($seekproductresult->num_rows>0){
    $count=1;
    foreach($seekproductresult as $product){
    ?>
    <tr>
        <td><?php echo $count; ?></td>
        <td><?php echo $product['productname']; ?></td>
        <td><?php echo $product['originalprice']; ?></td>
        <td><?php echo $product['discountpercent']; ?></td>
        <td><?php echo $product['discountprice']; ?></td>
        <td>
            <a href="editproduct.php?id=<?php echo $product['id']; ?>"><button id="editbtn"
                    class="btn">Edit</button></a>
            <button class="btn deletebtn" data-productid="<?php echo $product['id']; ?>">Delete</button>
        </td>
    </tr>

    <?php
$count++;
}
}
else{
    ?>
    <tr>
        <td colspan="6"> No products found</td>
    </tr>
    <?php
}

?>
</table>

<!-- jquery CDN  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function() {
    $(".deletebtn").on("click", function() {
        let productid = $(this).data("productid");
        if (confirm("Are you sure you want to delete this product?")) {
            $.ajax({
                url: "../functions/deleteproduct.php",
                type: 'POST',
                data: {
                    id: productid
                },
                success: function(response) {
                    alert(response);
                    location.reload();
                },
                error: function() {
                    alert("Error occured");
                }
            })
        }
    })
})
</script>
<style>
table {
    border: 1px solid black;
}

table th,
td {
    border: 1px solid black;
    padding: 5px;
}

.btn {
    padding: 5px 10px;
    border-radius: 8px;
    border: none;

}

#editbtn {
    background-color: #4CAF50;
    color: white;
}

.deletebtn {
    background-color: #f44336;
    color: white;
}
</style>
<?php
include "footer.php";
?>