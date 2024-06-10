<?php include('repeat/menu2.php');?>
<h2 style="text-align:center;padding-bottom:40px;padding-top:60px;"  id="foodid">Food Menu</h2>
    <section class="food_menu">

    <?php
    // get the search keyword 
    // $search = $_POST['search'];
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    
    //SQL Query to get food based on search keyword
    //$search = burger'
    //"SELECT * FROM tbl_food WHERE title LIKE '%burger'%' OR description LIKE '%burger'%'";
    $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

    //execute the query
    $rec = mysqli_query($conn,$sql);
    
    //count rows
    $count = mysqli_num_rows($rec);

    //check whether food availavle of not 
    if($count>0)
    {
        //food available
        while($row = mysqli_fetch_assoc($rec))
        {
            //get the details
            $id = $row['id'];
            $title = $row['title'];
            $description = $row['description'];
            $price = $row['price'];
            $image_name = $row['image_name'];
            ?>
            <div class="firstrow">
            <div class="bg_menu" >  
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
        // food not available 
        echo "Food not found";
    }

    ?>


<?php include('repeat/footer.php');?>