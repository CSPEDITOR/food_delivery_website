<?php
include('config/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
  
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container">
        <form method="POST">
            <span>Login</span>
            <?php
    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']); //removing the session
    }
   ?>
            <label>User Name :</label>                                                    
            <input type="text" placeholder="Enter your Username" name="username" required>            

            <label id="pass">Password :</label>                                                        
            <input type="password" placeholder="Enter your password" name="password" required>          

            <input type="submit" class="submit" name="submit" value="Login">              

            <!-- <div class="forgetandsignup">                                  
                <a href="../home.php"><input type="button" value="Home"></a>
                <a href=""><input type="button" value="forget password"></a>
            </div> -->
        </form>
    </div>
</body>
</html>

<?php
// check whether the submit button is clicked or not 
if(isset($_POST['submit'])){

    //process for login 
    //get the data from login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL to check whether the user with password exists or not
    $sql = "SELECT * FROM tbl_admin WHERE user_name = '$username' AND password = '$password'";

    // execute the query
    $rec = mysqli_query($conn,$sql);

    // count rows to check whether the user exists or not 
    $count = mysqli_num_rows($rec);
  echo $count;
    if($count == 1)
    {
        // user available and login success
        $_SESSION['login'] = "Login Successfully";
        $_SESSION['user'] = $username;
        // redirect to Home page / Dashboard
        header('location:'.HOMEURL.'admin/');


    }
    else{
        // user not available
        $_SESSION['login'] = "Login failed ";

        // redirect to Home page / Dashboard
        header('location:'.HOMEURL.'admin/admin-login.php');
    }
}
?>
