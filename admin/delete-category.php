<?php
//include config files
include ('./config/connection.php');

//check whether the id and image_name values is set or not
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    //get the vlaue and delete
    // echo "value is deleteed";
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //remove the physical image file is available
    if($image_name != "")
    {
        //image is available
        $path = "../imgs/category/".$image_name;

        //remove the images 
        $remove = unlink($path);

        // if failed to remove image then add an error message and stop the process 
        if($remove == false)
        {
            //Set the Session message 
            $_SESSION['remove']="failed to remove category image";

            //redirect to the manage category page 
            header('location:'.HOMEURL.'admin/manage-category.php');
            //stop the process
            die();


        }
    }

    //delete data from database
    $sql = "DELETE FROM tbl_category WHERE id=$id";

    //execute query
    $rec = mysqli_query($conn,$sql);

    //check wthether the data is deleted from data base or not
    if($rec == true)
    {
        ///set the success message and redirect to the manage admin page
        $_SESSION['delete']= "category deleted successfully";

        //redirect to message category
        header('location:'.HOMEURL.'admin/manage-category.php');
    }
    else{
        //set fail message and redirect 
        $_SESSION['delete']="failed to delete karreheho";
        //redirect to the manage category page with message
        header('location:'.HOMEURL.'admin/manage-category.php');
    }

} 
else{
    //redirect to manage categorypage
    header('location:'.HOMEURL.'admin/manage-category.php');
}


?>