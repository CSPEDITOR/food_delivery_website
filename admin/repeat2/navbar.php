<?php
    include ('./config/connection.php');
    include('login-check.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page
    </title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <header class="center">
        <nav class="center">
            <ul class="center">
                <a href="index.php"><li>Home</li></a>
                <a href="manage-admin.php"><li>admin</li></a>
                <a href="manage-category.php"><li>Category</li></a>
                <a href="manage-order.php"><li>Order</li></a>
                <a href="manage-food.php"><li>food</li></a>
                <a href="logout.php"><li>logout</li></a>
            </ul>
        </nav>
    </header>    
