<?php include('repeat/menu2.php');?>
<h2 style="text-align:center;padding-bottom:40px;padding-top:60px;"  id="foodid">Food Menu</h2>
    <section class="food_menu">

        <?php
        //getting foods from database that are active and featured
        // sql query
        $sql2 = "SELECT * FROM tbl_food";

        //EXECUETE ROWS
        $res2 =mysqli_query($conn,$sql2);

        //count rows
        $count2 = mysqli_num_rows($res2);

        //check whether food available or not
        if($count2 > 0)
        {
            //food available
            while($row = mysqli_fetch_assoc($res2))
            {
                //get all the values
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
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
                     <p><?php echo $price; ?></p>
                     <p id="detailsc"><?php echo $description ?></p>
                     <a href="order1.html">Order Now</a>
                 </div>
               </div>
             </div>

                <?php
            }
        }
        else{
            //food not available
            echo "Food not Available";
        }
        
        
        // //data-aos="fade-right"
        ?>
        
        
        </section>
        <a href="<?php echo HOMEURL; ?>#foodid" class="btn-primery">
            <p>back to Home</p>
        </a>


<?php include('repeat/footer.php');?>