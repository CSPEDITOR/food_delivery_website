<?php
    // including the config 
    include ('./config/connection.php');

    //get the id of admin to be deleted
    $id =$_GET['id'];

    //create SQL Query to delete Admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    // query execute the query 
    $rec = mysqli_query($conn,$sql);

    //check wherether the query execte or not
    if($rec==true)
    {
        //Query execte successfully and admin delete
        // echo "Admin deleted";
        // create a session variable to display message 
        $_SESSION ['delete'] = "Admin Deleted Successfully";
        //redirect to manage admin page 
        header("location:".HOMEURL.'admin/manage-admin.php');
    }
    else
    {
        // Query execute failed and not delete admin 
       // echo "Failed to delte admin";
    $_SESSION['delete'] = "Failed to Delete admin , Try again ";

    
    //redirect to Manage admin page with massage (succcess/error)
    header("location:".HOMEURL.'admin/manage-admin.php');
    }
?>