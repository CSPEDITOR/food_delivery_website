<?php
include('repeat2/navbar.php');
?>
<main>
    <div class="container center">
        <div class="small-container center padding">
            <h3>Add Food</h3>
            <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            ?>
            
            <div class="container2">
                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="tbladdadmin">
                        <tr>
                            <td>Title :</td>
                            <td>
                                <input type="text" name="title" placeholder="Enter title">
                            </td>
                        </tr>
                        <tr>
                            <td>Description :</td>
                            <td>
                                <textarea name="description" cols="30" rows="5" placeholder="description of the food"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Price : </td>
                            <td><input type="number" name="price"></td>
                        </tr>
                        <tr>
                            <td>Select Image :</td>
                            <td>
                                <input type="file" name="image">
                            </td>
                        </tr>
                        <tr>
                            <td>Category : </td>
                            <td>
                                <select name="category">
                                    <?php
                                    // create SQL to get all active categories from the database
                                    $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                                    // execute the query
                                    $rec = mysqli_query($conn, $sql);
                                    // count the rows to see if we have categories or not
                                    $count = mysqli_num_rows($rec);

                                    if($count > 0)
                                    {
                                        // we have categories
                                        while($row = mysqli_fetch_assoc($rec))
                                        {
                                            $id = $row['id'];
                                            $title = $row['title'];
                                            ?>
                                            <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        // we do not have categories
                                        ?>
                                        <option value="0">No Category Food</option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">Featured</td>
                            <td style="display: flex; align-items: center;">
                                <input type="radio" name="featured" value="Yes" style="height: 15px;"> Yes
                                <input type="radio" name="featured" value="No" style="height: 15px;"> No
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">Active</td>
                            <td style="display: flex; align-items: center;">
                                <input type="radio" name="active" value="Yes" style="height: 15px;"> Yes
                                <input type="radio" name="active" value="No" style="height: 15px;"> No
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" value="Add Admin" class="btn-primary" name="submit">
                            </td>
                        </tr>
                    </table>
                </form>

                <?php
                // Check whether the button is clicked or not
                if(isset($_POST['submit']))
                {
                    // Add the food to the database

                    // 1. Get the data from the form
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $category = $_POST['category'];

                    // Check whether radio buttons for featured and active are checked or not
                    $featured = isset($_POST['featured']) ? $_POST['featured'] : "No";
                    $active = isset($_POST['active']) ? $_POST['active'] : "No";

                    // 2. Upload the image if selected
                    if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != "")
                    {
                        // Get the details of the selected image
                        $image_name = $_FILES['image']['name'];

                        // 1. Rename the image
                        $temp = explode('.', $image_name);
                        $ext = end($temp);
                        $image_name = "Food-name" . rand(000, 999) . '.' . $ext;

                        // 2. Upload the image
                        $src = $_FILES['image']['tmp_name'];
                        $dest = "../imgs/food/" . $image_name;
                        $upload = move_uploaded_file($src, $dest);

                        if($upload == false)
                        {
                            // Failed to upload the image
                            $_SESSION['upload'] = "Failed to upload image";
                            header('location:' . HOMEURL . 'admin/add-food.php');
                            die();
                        }
                    }
                    else
                    {
                        $image_name = ""; // Set default value as blank
                    }

                    // 3. Insert into Database
                    $sql2 = "INSERT INTO tbl_food SET 
                    title = '$title',
                    description = '$description',
                    price = '$price',
                    image_name = '$image_name',
                    category_id = $category,
                    featured = '$featured',
                    active = '$active'";

                    // Execute the query
                    $res2 = mysqli_query($conn, $sql2);

                    // 4. Redirect with message to manage food page
                    if($res2 == true)
                    {
                        $_SESSION['add'] = "Food added successfully";
                        header('location:' . HOMEURL . 'admin/manage-food.php');
                    }
                    else
                    {
                        $_SESSION['add'] = "Failed to add food";
                        header('location:' . HOMEURL . 'admin/manage-food.php');
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
