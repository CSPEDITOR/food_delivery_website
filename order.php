<?php include('repeat/menu2.php'); ?>
<?php
// Initialize variables to avoid undefined variable warnings
// $image_name = "";
// $title = "";
// $price = 0;
// $order_date = "";

   //check whether food id is set or not
   if(isset($_GET['food_id']))
   {
    //get the food id and details of selected food
    echo $food_id = $_GET['food_id'];
    
    //get the details of the selected food
    $sql = "SELECT * FROM tbl_food WHERE id= $food_id";

    //execute the query
    $rec = mysqli_query($conn,$sql);

    //count the rows
    $count = mysqli_num_rows($rec);

    //check whether the data is available or not
    if($count == 1)
    {
        //we have data

        //GET the data form database
        $row = mysqli_fetch_assoc($rec);
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];

    }
    else
    {
        //food not availavle
        //redirect to home page
        header('location:'.HOMEURL);
    }


   }
   else{
    //redirect to homepage
    echo "<h1>eroor</h1>";
    // header('location:'.HOMEURL);
   }


?>
<section>
    <div class="container1">
        <h2 class="heading">Fill this form to confirm your order.</h2> 
                <!-- <div class="order"> -->
                    <div class="form">
                    <form action="" method = "POST">

            <div class="bg_menu">

                <?php
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
                            <p id="title"><b><?php echo $title; ?></b></p>
                            <input type="hidden" name="food" value="<?php echo $title; ?>">
                            <p>Rs <?php echo $price; ?></p>
                            <input type="hidden" name="price" value="<?php echo $price; ?>">
                            <b> <p>Quantity</p></b>
                            <input type="number" name="qty" class="input-responsive" value="1" required>
                    </div>
            </div>
           
            <div class="address">
                <h2>Delivery Address</h2>
                <div class="subcontainer">
            
                    <div class="order_add">Full Name</div>
                    <input type="text" name="full_name" placeholder="Enter your full name" class="input-responsive" required>
                    <div class="order_add">Phone Number</div>
                    <input type="tel" name="contact" placeholder="Enter your phone number" class="input-responsive" required>
                    
                    <div class="order_add">Email</div>
                    <input type="email" name="email" placeholder="Enter your email" class="input-responsive" required>
                    
                    <div class="order_add">Address</div>
                    <textarea name="address" rows="5" placeholder="Enter address" class="order_add" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" id="submit">

                    </form>
</div>
                    <?php
                     //check whether submit button is clicked or not
                     if(isset($_POST['submit']))
                     {
                        //get all the details from the form

                        $food = $_POST['food'];
                        $price = $_POST['price'];
                        $qty = $_POST['qty'];
                        $total = $price * $qty;  //total = price x qty

                        $order_date = date("y-m-d h:i:sa"); // order date

                        $status = "Ordered"; //order , ondelivery , Delivered & Cancelled
                        $customer_name = $_POST['full_name'];
                        $customer_contact = $_POST['contact'];
                        $customer_email = $_POST['email'];
                        $customer_address = $_POST['address'];

                        //save the order in database
                        //create SQL to save the data
                        $sql2 = "INSERT INTO tbl_order SET
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact= '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                        ";

                        echo $sql2; die();

                        //execute the query
                        $rec2 = mysqli_query($conn, $sql2);
                        
                        //check whether query executed successfully or not
                        if($rec2 == true)
                        {
                            //query executed and order saved
                            $_SESSION['order']= "Food Order SuccessFully.";
                            header('location:'.HOMEURL);
                            }
                            else{
                                $_SESSION['order']= "Failed to order.";
                                header('location:'.HOMEURL);
                                
                        }
                        
                    }
                    ?>
                </div>
            </div>
    </div>
      
</section>
<?php include('repeat/footer.php');?>