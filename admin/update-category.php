<?php
    include('repeat2/navbar.php');
?>

<main>
    <div class="container center">
        <div class="small-container center padding">
            <h3>Update Category</h3>

<?php
//check whether the id is set or not
if(isset($_GET['id']))
{
    //get the Id and all other deatils
    // echo "getting the data";
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_category WHERE id=$id";

    //execute the query
    $rec = mysqli_query($conn,$sql);

    //count the rows to check wheter the id is valid or not
    $count = mysqli_num_rows($rec);
    
    if($count ==1)
    {
        //get all the data
        $row = mysqli_fetch_assoc($rec);

        $title = $row['title'];
        $current_image = $row['image_name'];
        $featured = $row['featured'];
        $active = $row['active'];

    }
    else{
        //redirect the manage category with session message
        $_SESSION['no-category-found']= "Category not found";
        header('location:'.HOMEURL.'admin/manage-category.php');
    }

}
else{
    //redirect to manage category
    header('location:'.HOMEURL.'admin/manage-category.php');
}

?>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbladdadmin">
                   <tr>
                     <td>Title :</td>
                      <td>
                          <input type="text" name="title" value="<?php echo $title ?>">
                      </td>
                  </tr>
                   <tr>
                      <td>Current Image :</td>
                       <td>
                                <?php
                                 if($current_image != "")
                                     {
                                        // display the img
                                        ?>
                                        <img src="<?php echo HOMEURL;?>imgs/category/<?php echo $current_image ?>" width="150px" alt="">
                                        <?php

                                      }
                                 else{
                                    echo "Img is not added";

                                      }
                                 ?>
                      </td>
                   </tr>
                   <tr>
                        <td>New Image :</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                   </tr>
                   <tr>
                        <td>featured : </td>
                        <td><input <?php if($featured == "Yes") {echo "checked";} ?> type="radio" name="featured" value="Yes">Yes</td>
                        <td><input <?php if($featured == "No") {echo "checked";} ?> type="radio" name="featured" value="No">No</td>
                   </tr>
                   <tr>
                    <td>Active: </td>
                    <td><input <input <?php if($active == "Yes") {echo "checked";} ?> type="radio" name="active" value="Yes">Yes</td>
                    <td><input <input <?php if($active == "No") {echo "checked";} ?> type="radio" name="active" value="No">No</td>
                   </tr>
                   <tr >
                        <td colspan="2">
                            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update admin" class="btn-primery">

                        </td>
                    </tr>
                </table>
            </form>

<?php
if(isset($_POST['submit']))
{
    // echo "clicked";
    //1. Get all the values form our form
    $id = $_POST['id'];
    $title = $_POST['title'];
    $current_image = $_POST['current_image'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
    
    //2.updataing the new image if selected
    //check whether the image is selected or not
    if(isset($_FILES['image']['name']))
    {
        //get the img details
        $image_name = $_FILES['image']['name'];

        //check whether the image is available or not
        if($image_name != "")
        {
            //upload the new img
             //auto rename our img
                        //get the extension of out image (jpg,png,gif,etc) eg, food1.jpg
                        $ext = end(explode('.',$image_name));

                        // now renaming the image name
                        $image_name = "Food_Category_".rand(000,999).'.'.$ext;  //eg "food_Category_002.jpg"

                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../imgs/category/".$image_name;

                        //finally upload the image
                        $upload = move_uploaded_file($source_path,$destination_path);
                        
                        //check whether the img is uploaded or not 
                        //if the image is not uploaded then will stop th process and redirect with eorro message
                        if($upload == false)
                        {
                            //set the message
                            $_SESSION['upload']="Failed to upload image";

                            //redriect to add category page
                            header('location:'.HOMEURL.'admin/manage-category.php');
                            die();

                        }

            //remove the current img if available
            if($current_image != "")
            {
                $remove_path = "../imgs/category/".$current_image;
                $remove = unlink($remove_path);
    
                //check whether the image is removed or not 
                // if failed to remove then display message and stop the process
                if($remove == false)
                {
                    $_SESSION['failed-remove']= "failed to remove current image";
                    // redirect 
                    header('location:'.HOMEURL.'admin/manage-category.php');
                    die();
                }
            }
            


        }
        else{
            $image_name = $current_image;
        }
    }
    else{
        // we new to img name
        $image_name = $current_image;
    }


    // 3. then update the data base
    $sql2 ="UPDATE tbl_category SET title = '$title', image_name = '$image_name', featured = '$featured', active = '$active'
    WHERE id = $id ";
    
    //execute the query
    $rec = mysqli_query($conn,$sql2);

    // 4. the redirect to manage category with message
    //check wheter executed or not
    if($rec == true)
    {
        $_SESSION['update']= "Category updated successfully";
        header('location:'.HOMEURL.'admin/manage-category.php');
        // echo "done";
    }
    else
    {
        // echo "not done";
        $_SESSION['update']= "Failed to update Category";
        header('location:'.HOMEURL.'admin/manage-category.php');
    }
}


?>

         </div>
    </div>
 </main>


 <?php
    include ('repeat2/footer.php');
?>
