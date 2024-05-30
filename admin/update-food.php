<?php
ob_start(); // Start output buffering
include('repeat2/navbar.php');
?>

<?php
// Check whether ID is set or not
if (isset($_GET['id'])) {
    // Get all the details
    $id = $_GET['id'];

    // SQL query to get the selected food
    $sql2 = "SELECT * FROM tbl_food WHERE id = $id";

    // Execute the query
    $rec2 = mysqli_query($conn, $sql2);

    // Get the value based on query executed
    $row2 = mysqli_fetch_assoc($rec2);

    // Get the individual values of selected food
    $title = $row2['title'];
    $description = $row2['description'];
    $price = $row2['price'];
    $current_image = $row2['image_name'];
    $current_category = $row2['category_id'];
    $featured = $row2['featured'];
    $active = $row2['active'];
} else {
    // Redirect to manage food
    header('location:' . HOMEURL . 'admin/manage-food.php');
    exit();
}
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
                            <input type="text" name="title" value="<?php echo $title ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Description :</td>
                        <td>
                            <textarea name="description" cols="30" rows="5"><?php echo $description ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Price : </td>
                        <td><input type="number" name="price" value="<?php echo $price ?>"></td>
                    </tr>
                    <tr>
                        <td>Current Image :</td>
                        <td>
                            <?php
                            if ($current_image == "") {
                                echo "Image is not available";
                            } else {
                                ?>
                                <img src="<?php echo HOMEURL; ?>imgs/food/<?php echo $current_image; ?>" width="100px" alt="">
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Select New Image : </td>
                        <td><input type="file" name="image"></td>
                    </tr>
                    <tr>
                        <td>Category: </td>
                        <td>
                            <select name="category">
                                <?php
                                // Query to get Active category
                                $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";

                                // Execute the Query
                                $rec = mysqli_query($conn, $sql);

                                // Count rows
                                $count = mysqli_num_rows($rec);

                                // Check whether categories available or not
                                if ($count > 0) {
                                    // Available
                                    while ($row = mysqli_fetch_assoc($rec)) {
                                        $category_title = $row['title'];
                                        $category_id = $row['id'];
                                        ?>
                                        <option <?php if ($current_category == $category_id) {echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                        <?php
                                    }
                                } else {
                                    // Category not available
                                    echo "<option value='0'>Category not available</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Featured :</td>
                        <td style="display: flex; align-items: center;">
                            <input <?php if ($featured == "Yes") {echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                            <input <?php if ($featured == "No") {echo "checked";} ?> type="radio" name="featured" value="No"> No
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Active : </td>
                        <td style="display: flex; align-items: center;">
                            <input <?php if ($active == "Yes") {echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                            <input <?php if ($active == "No") {echo "checked";} ?> type="radio" name="active" value="No"> No
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                            <input type="submit" name="submit" value="Update admin" class="btn-primery">
                        </td>
                    </tr>
                </table>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                // echo "clicked";
                // 1. Get all the details from the form 
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                // 2. Upload the image if selected
                // Check whether the upload button is clicked or not
                if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
                    // Upload button clicked
                    $image_name = $_FILES['image']['name'];

                    // Check whether the file is available or not
                    if ($image_name != "") {
                        // Image is available

                        // A. Upload new image 
                        // Rename the image
                        $ext = end(explode('.', $image_name));

                        $image_name = "Food-Name" . rand(000, 999) . '.' . $ext;

                        // Get the source path and destination path
                        $src_path = $_FILES['image']['tmp_name'];
                        $dest_path = "../imgs/food/" . $image_name;

                        // Finally upload the image
                        $upload = move_uploaded_file($src_path, $dest_path);

                        // Check whether the image is uploaded or not
                        if ($upload == false) {
                            // Failed to upload
                            $_SESSION['upload'] = "Failed to upload new image.";
                            header('location:' . HOMEURL . 'admin/manage-food.php');
                            // Stop the process
                            die();
                        }

                        // 3. Remove the image if new image is uploaded and current image exists
                        // B. Remove the current image if available
                        if ($current_image != "") {
                            // Current image is available
                            // Remove the image 
                            $remove_path = "../imgs/food/" . $current_image;

                            $remove = unlink($remove_path);

                            // Check whether the image is removed or not
                            if ($remove == false) {
                                // Failed to remove current image
                                $_SESSION['remove-failed'] = "Failed to remove current image";

                                // Redirect to manage food
                                header('location:' . HOMEURL . 'admin/manage-food.php');

                                // Stop the process
                                die();
                            }
                        }
                    }
                } else {
                    $image_name = $current_image;
                }

                // 4. Update the food in database
                $sql3 = "UPDATE tbl_food SET
                title = '$title',
                description = '$description',
                price = $price,
                image_name = '$image_name',
                category_id = '$category',
                featured = '$featured',
                active = '$active'
                WHERE id = $id";

                // Execute the SQL query
                $rec3 = mysqli_query($conn, $sql3);

                // Check whether the query is executed or not
                if ($rec3 == true) {
                    // Query executed and food updated
                    $_SESSION['update'] = "Food updated successfully";
                    header('location:' . HOMEURL . 'admin/manage-food.php');
                    exit();
                } else {
                    $_SESSION['update'] = "Failed to update food";
                    header('location:' . HOMEURL . 'admin/manage-food.php');
                    exit();
                }
            }
            ?>
        </div>
    </div>
</main>

<?php
include('repeat2/footer.php');
ob_end_flush(); // Flush the output buffer
?>
