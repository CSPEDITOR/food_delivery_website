<?php include('repeat/menu2.php');?>
<?php
//check whether id si passed or not
if(isset($_GET['category_id']))
{
    //category id is set and get the id
    $category_id = $_GET['category_id'];
    //get the category title based on category id
    $sql = "SELECT title FROM tbl_category WHERE id= $category_id";

    //execute the query
    $rec = mysqli_query($conn,$sql);

    //get the values form database
    $row = mysqli_fetch_assoc($rec);

    //get the title
    $category_title = $row['title'];
}
else{
    //category not passed
    //regirect to home page
    header('location:'.HOMEURL);
}
?>
<h2 style="text-align:center;padding-bottom:40px;padding-top:60px;"  id="foodid">Food Menu</h2>
<section class="food_menu">
    <form action="" method="POST">
<?php
//create query to get foods based on selected categorys
$sql3 = "SELECT * FROM tbl_food WHERE category_id = $category_id";

//execute the query 
$rec2 = mysqli_query($conn,$sql3);

$count2 = mysqli_num_rows($rec2);

//check whether food is available or not
if($count2 > 0)
{

//food is available
while($row2 = mysqli_fetch_assoc($rec2))
{
    $id= $row2['id'];
    $title= $row2['title'];
    $price= $row2['price'];
    $description= $row2['description'];
    $image_name= $row2['image_name'];
    ?>
  <div class="firstrow">
        <div class="bg_menu">
        <?php
            //check whether image available or not
            if($image_name=="")
            {
                //image not available
                echo "Food image not available";
            }
            else{
                ?>
                <img src="<?php echo HOMEURL; ?>imgs/food/<?php echo $image_name; ?>" alt="food">

                <?php
            }
            ?>
            <div class="details">
                  <p><b><?php echo $title; ?></b></p>
                  <p>Rs <?php echo $price; ?></p>
                  <p id="detailsc"><?php echo $description ?></p>
                  <a href="<?php echo HOMEURL; ?>order.php?food_id=<?php echo $id; ?>">Order Now</a>
            </div>
        </div>
    </div>
    <?php
}
}

else{
// foot not available
echo "Food not available";

}
?>
</form>
</section>
<?php include('repeat/footer.php');?>