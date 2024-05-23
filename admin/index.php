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
                    <h2>2</h2>
                    <br>
                    Home
                </div>
                <div class="box center">
                    <h2>2</h2>
                    <br>
                    admin
                </div>
                <div class="box center">
                    <h2>2</h2>
                    <br>
                    Admin
                </div>
                <div class="box center">
                    <h2>2</h2>
                    <br>
                    Admin
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include ('repeat2/footer.php');
 ?>