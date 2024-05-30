<?php
    include('repeat2/navbar.php');
?>

<main>
    <div class="container center">
        <div class="small-container center padding">
            <h3>Update Category</h3>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbladdadmin">
                <tr>
                     <td>Title :</td>
                     <td>
                        <input type="text" name="title">
                     </td>
                </tr>
                <tr>
                     <td>Description :</td>
                     <td>
                      <textarea name="description" cols="30" rows="5"></textarea>
                     </td>
                 </tr>
                  <tr>
                      <td>Price : </td>
                      <td><input type="number" name="price"></td>
                  </tr>
                   <tr>
                     <td>Current Image :</td>
                     <td>
                       display the img
                     </td>
                   </tr>
                   <tr>
                    <td>new img</td>
                   </tr>
                   <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">
                        <?php
                        //Query to get Active cartegory
                            $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";

                            //execute the Query
                            $rec = mysqli_query($conn,$sql);

                            //count rows
                            $count = mysqli_num_rows($rec);

                            //check wether categories availavle or not
                            if($count > 0)
                            {
                                //available
                                while($row = mysqli_fetch_assoc($rec))
                                {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];
                                    echo " <option value='$categoryid'>$category_title</option>";
                                }
                            }
                            else
                            {
                                // category not available 
                                echo "<option value='0'>Category not available</option>";
                            }



                        ?>
                            <!-- <option value="0">test category</option> -->
                        </select>
                    </td>
                   </tr>
                   <tr>
                    <td>
                        featured :
                    </td>
                    <td>
                        <input type="radio" name="featured" value="Yes">yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                   </tr>
                   <tr>
                    <td>Active : </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                   </tr>
                    <tr>
                        <td colspan=2>
                        <input type="submit" name="submit" value="Update admin" class="btn-primery">
                        </td>
                    </tr>
                
                
            
            </table>           
            </form>
       </div>
   </div>
</main>





<?php
    include('repeat2/footer.php');
?>