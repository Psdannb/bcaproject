<?php
session_start();
$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- jquery CDN  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="first">
        <h1>🍂Fresh Fruits</h1>
        <!--...................................................................
 Navigation Bar
 ...................................................................... -->
        <nav>
            <ul>
                <li><span></span> Welcome <?php echo $username ;?></li>
                <li><a href="index.php"><span>Home</span></a></li>
                <li><a href="#products"><span>Products</span></a></li>
                <li><a href="#about"><span>About</span></a></li>
                <li><a href="#service"><span>Service</span></a></li>
                <li><a href="#contact"><span>Contact</span></a></li>
                <!-- <li><button class="add-to-cart"><i class="fas fa-shopping-cart"></i></button></li> -->
                <?php

if($role == 1) {
    ?>
                <li><a href="addproduct.php">Product management</a></li>
                <?php
}
?>
                <!-- <li><a href="login.html"><i class="fa-chisel fa-regular fa-user"></i></a></li> -->

            </ul>
        </nav>

    </div>