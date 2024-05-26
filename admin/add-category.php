<?php
    include('repeat2/navbar.php');
?>
<main>
    <div class="container center">
        <div class="small-container center padding">
            <h3>Add category</h3>
            <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset ($_SESSION['upload']);
            }
            
            ?>

            <div class="container2">
                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="tbladdadmin" >
                        <tr>
                            <td>Title</td>
                            <td><input type="text" placeholder="Enter category title" name="title"></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="file" name="image">
                            </td>
                        </tr>
                        <tr >
                            <td style="vertical-align: top;">
                                         featured
                            </td>
                            <td style="display:flex; align-items: center;">
                                        <input type="radio" name="featured" value="Yes" style="height:15px;">Yes
                                        <input type="radio" name="featured" value="No" style="height:15px;">No
                             </td>
                        </tr>
                        <tr>
                            <td style=" vertical-align: top;">Active</td>
                            <td style="display:flex; align-items: center; "><input type="radio" name="active" value="Yes" style="height:15px;">Yes
                            <input type="radio" name="active" value="No" style="height:15px;">No</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" value="Add Admin" class="btn-primery" name="submit">
                            </td>
                        </tr>
                    </table>
                </form>


                <?php
                //check whether submit button is click or not
                if(isset($_POST['submit']))
                {
                    // echo "clicked";
                    //get the value from category form
                    $title = $_POST['title'];
                    
                    //for radio input type to check whether the button is selected or not
                    if(isset($_POST['featured']))
                    {
                        //get the value from form
                        $featured = $_POST['featured'];
                    }
                    else{
                        //set the defoult value
                        $featured = "No";
                    }
                    if(isset($_POST['active'])){
                        $active = $_POST['active'];
                    }
                    else{
                        $active = "No";
                    }

                    //check whether the image is selected or not and set the value for image name accordingly
                    // print_r($_FILES['image']);
                    // die();

                    if(isset($_FILES['image']['name']))
                    {
                        //upload the image
                        //to upload image we need image name, source path and destination path 
                        $image_name = $_FILES['image']['name'];
                        if($image_name != "")
                        {
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
                            header('location:'.HOMEURL.'admin/add-category.php');
                            die();

                        }
                    }
                    }
                    else{
                        // dont upload the image and se the name as blank
                        $image_name = "";
                    }

                    //create sql query to insert category to database
                    $sql="INSERT INTO tbl_category SET 
                    title='$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                    ";

                    //execute the query and save in databse
                    $rec = mysqli_query($conn,$sql);

                    //check whether the query execute or note and data added or not
                    if($rec)
                    {
                        //query executed and category added
                        $_SESSION['add']= "Category added Successfully";

                        //redirect to manage category page 
                        header('location:'.HOMEURL.'admin/manage-category.php');
                    }
                    else{
                        //failed to add category
                        $_SESSION['add']= "Category fail to add";

                        //redirect to manage category page 
                        header('location:'.HOMEURL.'admin/add-category.php');
                    }
                }
                


                ?>


            </div>
        </div>
    </div>
</main>
<?php
    include ('repeat2/footer.php');
?>