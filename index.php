    <?php include('repeat/menu2.php'); ?>
    <section class="categories" id="homeid">
        <div class="explore">
            <h2>
                Explore Foods
            </h2>
        </div>
        <div class="option" id="category">
            <?php 
            //craete sql query to display categoryes form database
            $sql = "SELECT * FROM tbl_category";

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
                        <a href="#">
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

    </section>
    <section class="food_menu" id="foodid">
        <h2>Food Menu</h2>
        <div class="firstrow">
            <div class="bg_menu" data-aos="fade-right">
                <img src="imgs/starter1.jpg" alt="food">
                <div class="details">
                    <p><b> Maggie</b></p>
                    <p>Rs 30/-</p>
                    <p id="detailsc">Made with Italian Sauce, organice vegetables.</p>
                    <a href="order1.html">Order Now</a>
                </div>
            </div>
            <div class="bg_menu" data-aos="fade-left">
                <img src="imgs/starter2.jpg" alt="food">
                <div class="details">
                    <p><b> Salad</b></p>
                    <p>Rs 40/-</p>
                    <p id="detailsc">this item made by Sibu Sahoo using many veg </p>
                    <a href="order2.html">Order Now</a>
                </div>
            </div>
        </div>
        <div class="firstrow">
            <div class="bg_menu" data-aos="fade-right">
                <img src="imgs/rice1.png" alt="food">
                <div class="details">
                    <p>Fryed Rice</p>
                    <p>Rs 50/-</p>
                    <p id="detailsc">made by Italian cooker, mixed with veg & nov both</p>
                    <a href="order3.html">Order Now</a>
                </div>
            </div>
            <div class="bg_menu" data-aos="fade-left">
                <img src="imgs/rice2.png" alt="food">
                <div class="details">
                    <p>Rice</p>
                    <p>Rs 30/-</p>
                    <p id="detailsc">Biryani Rice also available</p>
                    <a href="order4.html">Order Now</a>
                </div>
            </div>
        </div>
        <div class="firstrow">
            <div class="bg_menu" data-aos="fade-right">
                <img src="imgs/starter6.jpg" alt="food">
                <div class="details">
                    <p>Chicken pakora</p>
                    <p>Rs 99/-</p>
                    <p id="detailsc">Non veg and 5 pices for plate</p>
                    <a href="order5.html">Order Now</a>
                </div>
            </div>
            <div class="bg_menu" data-aos="fade-left">
                <img src="imgs/starter5.jpg" alt="food">
                <div class="details">
                    <p>Dry Veg</p>
                    <p>Rs 40/-</p>
                    <p id="detailsc">Only vegetables</p>
                    <a href="order6.html">Order Now</a>
                </div>
            </div>
        </div>
        <a href="#">
            <p>See all foods</p>
        </a>

    </section>
    <section class="customer">
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
            offset: 200,
            duration: 500,
        });
    </script>