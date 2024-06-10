    <?php include('repeat/menu2.php'); ?>
    <section class="categories" id="homeid">
        <div class="explore">
            <h2>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus architecto soluta esse culpa rerum recusandae, quasi repellat veniam doloremque repellendus libero odio, eum incidunt? Tempore, molestias sequi? Numquam, ut iusto!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus architecto soluta esse culpa rerum recusandae, quasi repellat veniam doloremque repellendus libero odio, eum incidunt? Tempore, molestias sequi? Numquam, ut iusto!
            </h2>
            <img width="500px" src="imgs/bg32.png" alt="" data-aos="fade-left">
        </div>
        <br>
        <br><br><br>
        <br id="category">
        <br>
        <br>
        <br>
        <h2  style="text-align: center;">Food Category </h2>
        <br>
        <div class="option">
           
            <?php 
            //craete sql query to display categoryes form database
            $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured= 'Yes' LIMIT 3";

            //execute the query
            $rec = mysqli_query($conn,$sql);
                        //Count rows to check whether the category is available or not
            $count = mysqli_num_rows($rec);

            if($count >0)
            {
                //category is Availble
                while($row = mysqli_fetch_assoc($rec))
                {
                    //get the values like id ,title ,image_name
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="breakfast">
                        <p><?php echo $title; ?></p>
                        <a href="<?php HOMEURL;?>category-food.php?category_id=<?php echo $id; ?>">
                            <?php
                            if($image_name =="")
                            {
                                echo "Image not Available";
                            }
                            else
                            {
                                ?>

                                <img src="<?php echo HOMEURL; ?>imgs/category/<?php echo $image_name; ?>" alt="breakfast item">
                                 <?php

                            }
                            ?>
                        </a>
                     </div>
                     

                    <?php

                }
            }
            else{
                //not Available category
                echo "Category not added.";
            }
            ?>
           
            <!-- <div class="breakfast">
                <p>Lunch</p>
                <a href="#"><img src="imgs/lunch.jpg" alt="lunch items"></a>

            </div> -->
            <!-- <div class="breakfast">
                <p>Dinner</p>
                <a href="#"><img src="imgs/dinner.jpg" alt="dinner items"></a>


            </div> -->
        </div>
        <a href="<?php echo HOMEURL;?>category.php" style="text-align:center; color:#47B4D1;font-size:1rem; text-decoration: none; ">More Category</a>

    </section>
    <h2 style="text-align:center;padding-bottom:40px;padding-top:60px;"  id="foodid">Food Menu</h2>
    <section class="food_menu">

        <?php
        //getting foods from database that are active and featured
        // sql query
        $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";

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
            <div class="bg_menu" data-aos="fade-right" >  
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
        
        
        
        ?>
        
        
        </section>
        <a href="<?php echo HOMEURL; ?>food.php" class="btn-primery">
            <p>See all foods</p>
        </a>
    <section class="customer" id="about" >
        <div class="review">
            <div class="cooker" data-aos="fade-right">
                <img src="imgs/cooker.png" alt="">
            </div>
            <div class="reviewtext">
                <h2>About us</h2>
                <p>"WowFood is the best. Besides the many and delicious meals, the service is also very good. especially
                    in the very fast delivery. I highly recommend WowFood to you" </p>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="contactus">
            <div class="contact_container">
            <h2>Contact Us</h2>
            <form action="">
                <p>Name</p>
                <input type="text" placeholder="Enter you name">
                <p>Phone no</p>
                <input type="text" placeholder="Enter you phone">
                <p>Email</p>
                <input type="text" placeholder="Enter you email">
                <button> Submit </button>
            </form>
        </div>
        </div>
    </section>
    <?php include('repeat/footer.php'); ?>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 100,
            duration: 500,
        });
    </script>