<?php
    // include('config/connection.php');
    include('repeat2/navbar.php');
?>

<main>
    <div class="container center">
        <div class="small-container center">
            <h3>Dashboard</h3>

<?php
    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']); //removing the session
    }
?>
            <div class="container2">
                <div class="box center">

                <?php
                //sql query
                $sql = "SELECT * FROM tbl_category";

                //execute querry
                $res = mysqli_query($conn,$sql);

                //count rows
                $count = mysqli_num_rows($res);

                
                ?>
                    <h2><?php echo $count;?></h2>
                    <br>
                    Categories
                </div>
                <div class="box center">

                <?php
                //sql query
                $sql2 = "SELECT * FROM tbl_food";

                //execute querry
                $res2 = mysqli_query($conn,$sql2);

                //count rows
                $count2 = mysqli_num_rows($res2);

                
                ?>
                    <h2><?php echo $count2; ?></h2>
                    <br>
                    Foods
                </div>
                <div class="box center">
                <?php
                //sql query
                $sql3 = "SELECT * FROM tbl_order";

                //execute querry
                $res3 = mysqli_query($conn,$sql3);

                //count rows
                $count3 = mysqli_num_rows($res3);

                
                ?>
                    <h2><?php echo $count3; ?></h2>
                    <br>
                    Total Orders
                </div>
                <div class="box center">
                    <?php
                    //create sql query to get total revenue generated
                    //aggregate function in sql
                    $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered' ";

                    //execute the  query
                    $res4 = mysqli_query($conn,$sql4);

                    //get the value
                    $row4= mysqli_fetch_assoc($res4);

                    //get the total revenue
                    $total_revenue = $row4['Total'];

                    ?>
                    <h2>Rs.<?php echo $total_revenue; ?></h2>
                    <br>
                    Revenue Generated
                </div>
            </div>
        </div>
    </div>
</main>

<?php
    include ('repeat2/footer.php');
?>