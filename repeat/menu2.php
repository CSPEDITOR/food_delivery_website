<?php 
include ('admin/config/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>food_Order</title>
    <link rel="icon" type="image/x-icon" href="../imgs/favicon.png">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/navigation.css">
    <!-- <link rel="stylesheet" href="css/resposive.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- <link rel="stylesheet" href="css/order.css"> -->
    <link rel="icon" type="image/x-icon" href="../imgs/favicon.png">
</head>

<body>

<header>
        <section class="navbar">
            <div class="container">
                <div class="logo">
                    <a href="#" title="Logo">
                        <img src="imgs/logo.png" alt="Restaurant Logo" class="img-responsive">
                    </a>
                </div>

                <div class="search">
                    <form action="food-search.html" method="POST" class="formm">
                        <input type="search" name="search" placeholder="Search for Food.." class="btn1" required>
                        <input type="submit" name="submit" value="Search" class="btn2">
                    </form>
                </div>

                <div class="menu">
                    <ul>
                        <li>
                            <a href="#homeid">Home</a>
                        </li>
                        <li>
                            <a href="#category">Categories</a>
                        </li>
                        <li>
                            <a href="#foodid">Foods</a>
                        </li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li>
                            <a href="<?php echo HOMEURL;?>admin/admin-login.php">Admin</a>
                        </li>
                    </ul>
                </div>
            </div>

        </section>
    </header>