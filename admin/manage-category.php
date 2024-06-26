<?php
    include('repeat2/navbar.php');
?>
<main>
    <div class="container center">
        <div class="small-container center">
            <h3>Manage Category</h3>
            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset ($_SESSION['add']);
                }
                if(isset($_SESSION['remove']))
                {
                    echo $_SESSION['remove'];
                    unset ($_SESSION['remove']);
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset ($_SESSION['delete']);
                }
                if(isset($_SESSION['no-category-found']))
                {
                    echo $_SESSION['no-category-found'];
                    unset ($_SESSION['no-category-found']);
                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset ($_SESSION['update']);
                }
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset ($_SESSION['upload']);
                }
                if(isset($_SESSION['failed-remove']))
                {
                    echo $_SESSION['failed-remove'];
                    unset ($_SESSION['failed-remove']);
                }
            ?>
            <a href="<?php echo HOMEURL; ?>admin/add-category.php" class="btn-primery">Add Category</a>
    
            <div class="container2">
               <table>
                <tr>
                    <th>S.N</th>
                    <th>Titile</th>
                    <th>Image</th>
                    <th>featured</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>


                <?php

                        //Query to get all category from database
                        $sql = "SELECT * FROM tbl_category";

                        //Execute Query 
                        $rec = mysqli_query($conn,$sql);

                        //count Rows
                        $count = mysqli_num_rows($rec);

                        //create serial number variable and assign value as 1
                        $sn=1;

                        //check whether we have data in database or not
                        if($count > 0)
                        {
                            //we have data in database
                            //get the data and display
                            while($row = mysqli_fetch_assoc($rec))
                            {
                                $id = $row['id'];
                                $titile = $row['title'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>
                                <tr>
                                    <td><?php echo $sn++;?></td>
                                    <td><?php echo $titile; ?></td>

                                    <td>
                                        <?php
                                        //check whether image name is avliable or not 
                                        if($image_name != "")
                                        {
                                            //display the img
                                            ?>
                                            <img src="<?php echo HOMEURL; ?>imgs/category/<?php echo $image_name; ?>" width="100px" alt="">
                                            <?php
                                        }
                                        else{
                                            // display the img 
                                            echo "No image or Image is not added";
                                        }
                                         ?>
                                    </td>

                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    
                                    <td>
                                        <a href="<?php echo HOMEURL; ?>admin/update-category.php?id=<?php echo $id?>" class="btn-secondary">Update Category</a>
                                        <a href="<?php echo HOMEURL;?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Remove Category</a>
                                </td>
                                </tr>   

                    <?php

                            }
                        }
                        else{
                            //we do not have data
                            //we will display the message inside the table
                    ?>
                            <tr>
                                <td colspan="6">
                                    No category added.
                                </td>
                            </tr>
              <?php
                        }



                ?>



                    
               </table>
           
            </div>
        </div>
    </div>
</main>
<?php
    include ('repeat2/footer.php');
?>