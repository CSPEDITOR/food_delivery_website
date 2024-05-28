<?php
    include('repeat2/navbar.php');
?>
<main>
    <div class="container center">
        <div class="small-container center">
            <h3>Food</h3>
            <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            ?>
            <a href="<?php echo HOMEURL; ?>admin/add-food.php" class="btn-primery"> Add Food</a>
            <div class="container2">
               <table>
                <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>price</th>
                    <th>image_name</th>
                    <th>featured</th>
                    <th>active</th>
                    <th>action</th>
                </tr>
<?php 
//create a SQL Query to Get all the food
$sql = "SELECT * FROM tbl_food";

//execute the query
$rec = mysqli_query($conn,$sql);

//count rows to check whether we have foods or not
$count = mysqli_num_rows($rec);
//create serial number
$sn=1;
if($count>0)
{
    //we have food in database
    while($row =mysqli_fetch_assoc($rec))
    {
        $id = $row['id'];
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
        $featured = $row['featured'];
        $active = $row['active'];
        ?>
         <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $title; ?></td>
                    <td><?php echo $price; ?></td>
                    <td>
                        <?php 
                            //check whether we have image or not
                            if($image_name == "")
                            {
                                //we have image display error message
                            }
                            else{
                                //we have image and display image
                                ?>
                                <img src="<?php echo HOMEURL;?>imgs/food/<?php echo $image_name; ?>" width="100px" alt="">


                                <?php                            }
                        ?>
                    </td>
                    <td><?php echo $featured; ?></td>
                    <td><?php echo $active; ?></td>
                    <td>
                        <a href="#" class="btn-secondary">admin upadate</a>
                        <a href="#" class="btn-danger">admin remove</a>
                    </td>
        </tr>

        <?php
    }
}
else{
    //food not added in database
    echo "<tr><td colspan='6'>food not added yet. </td></tr>";
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