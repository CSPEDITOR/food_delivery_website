<?php
// include config
include ('config/connection.php');

//destroy the session 
session_destroy();
// redirect to login page
header('location:'.HOMEURL.'admin/admin-login.php');
?>