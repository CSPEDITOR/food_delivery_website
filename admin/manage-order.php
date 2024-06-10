<?php
    include('repeat2/navbar.php');
?>
<main>
    <div class="container center">
        <div class="small-container center">
            <h3>Order</h3>
            <div class="container2">
            <div class="container2">
               <table>
                <tr>
                    <th>S.N</th>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>total</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Customer Name</th>
                    <th>Customer Contact</th>
                    <th>Customer Email</th>
                    <th>Customer Address</th>
                    <th>Action</th>
                </tr>
             <?php

                //get all the orders form database
                $sql = "SELECT * FROM tbl_order ORDER BY id DESC";

                //Execute Query
                $res = mysqli_query($conn,$sql);

                //count the rows
                $count = mysqli_num_rows($res);
                $sn = 1;

                if($count > 0)
                {
                    //order Available
                    while ($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $food = $row['food'];
                        $price = $row['price'];
                        $qty = $row['qty'];
                        $total = $row['total'];
                        $order_date = $row['order_date'];
                        $status = $row['status'];
                        $customer_name = $row['customer_name'];
                        $customer_contact = $row['customer_contact'];
                        $customer_email = $row['customer_email'];
                        $customer_address = $row['customer_address'];
                        ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $food; ?></td>
                            <td><?php echo $price; ?></td>
                            <td><?php echo $qty; ?></td>
                            <td><?php echo $total; ?></td>
                            <td><?php echo $order_date; ?></td>
                            <td><?php echo $status; ?></td>
                            <td><?php echo $customer_name; ?></td>
                            <td><?php echo $customer_contact; ?></td>
                            <td><?php echo $customer_email; ?></td>
                            <td><?php echo $customer_address; ?></td>
                            <td>
                                 <a href="#" class="btn-secondary">Order upadate</a>
                                 <!-- <a href="#" class="btn-danger">admin remove</a> -->
                            </td>
                        </tr>


                        <?php
                    }
                }
                else{

                    //order not available
                    echo "<tr><td colspan='12'> order not available</td></tr>";
                }

                ?>



               
               
               </table>
            </div>
            </div>
        </div>
    </div>
</main>
<?php
    include ('repeat2/footer.php');
?>