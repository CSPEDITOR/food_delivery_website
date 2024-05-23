<?php
// Authorization - Access Control
// check whether the user is logged in not
if(!isset($_SESSION['user'])) // if user is not set
{
    //user is not logged in 
    //redirect to login page with message
    $_SESSION['no-login-message'] = "Please login to access Admin panel";

    //Redirect to login page
    header('location:'.HOMEURL.'admin/admin-login.php');
}
?>