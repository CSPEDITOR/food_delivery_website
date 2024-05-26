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
                        <td><input type="radio" name="featured" value="Yes">Yes</td>
                        <td><input type="radio" name="featured" value="No">No</td>
                   </tr>
                   <tr>
                    <td>Active: </td>
                    <td><input type="radio" name="active" value="Yes">Yes</td>
                    <td><input type="radio" name="active" value="No">No</td>
                   </tr>
                   <tr >
                        <td colspan="2">
                            <!-- <input type="hidden" name="id" value="<?php echo $id?>"> -->
                            <input type="submit" name="submit" value="Update admin" class="btn-primery">

                        </td>
                    </tr>
                </table>
            </form>
         </div>
    </div>
 </main>


 <?php
    include ('repeat2/footer.php');
?>
