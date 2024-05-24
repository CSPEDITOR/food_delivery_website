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
            
            ?>

            <div class="container2">
                <form action="" method="POST">
                    <table class="tbladdadmin" >
                        <tr>
                            <td>Title</td>
                            <td><input type="text" placeholder="Enter category title" name="title"></td>
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
                    $sql="INSERT INTO tbl_category SET 
                    title='$title',
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