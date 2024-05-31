<?php include('repeat/menu2.php'); ?>
<section>
    <div class="container1">
         <h2 class="heading">Fill this form to confirm your order.</h2> 
        <!-- <div class="order"> -->
        <div class="bg_menu">
            <img src="imgs/starter1.jpg" alt="food">
            <div class="details">
                <p id="title"><b> Maggie</b></p>
                <p>Rs 30/-</p>
               <b> <p>Quantity</p></b>
               <input type="number" name="qty" class="input-responsive" value="1" required>
            </div>
        </div>
    <!-- </div> -->
    <div class="address">
        <h2>Delivery Address</h2>
        <div class="subcontainer">

            <div class="order_add">Full Name</div>
            <input type="text" name="full-name" placeholder="Enter your full name" class="input-responsive" required>

                    <div class="order_add">Phone Number</div>
                    <input type="tel" name="contact" placeholder="Enter your phone number" class="input-responsive" required>
                    
                    <div class="order_add">Email</div>
                    <input type="email" name="email" placeholder="Enter your email" class="input-responsive" required>
                    
                    <div class="order_add">Address</div>
                    <textarea name="address" rows="5" placeholder="Enter address" class="order_add" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" id="submit">
                </div>
            </div>
        </div>
</section>
<?php include('repeat/footer.php');?>