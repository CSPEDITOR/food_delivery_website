<?php
include('repeat/menu2.php');?>
  <section class="categories" id="homeid">
      <br><br><br>
      <br><br><br>
      <h2 style="text-align:center;">Food Category</h2>
      <br><br><br>
      <div class="option">
           
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
        
    </section>
<?php include('repeat/footer.php'); ?>