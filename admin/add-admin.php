<?php
include('repeat2/navbar.php');

if(isset($_POST['submit'])) 
{
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password =$_POST['password']; //for creating encryption use md5

    $sql = "INSERT INTO tbl_admin (full_name, user_name, password) VALUES ('$full_name', '$username', '$password')";

    $rec = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if($rec == TRUE) {

        //creating a session variable
        $_SESSION['add']= "Admin added successfully";
        // redirect this page the page to manage admin page
        header("location:".HOMEURL.'admin/manage-admin.php');
    } 
    else {
 //creating a session variable
 $_SESSION['add']= "failed to add admin";
 // redirect this page the page to manage admin page
 header("location:".HOMEURL.'admin/manage-admin.php');
    }
}
?>
<main>
    <div class="container center">
        <div class="small-container center padding">
            <h3>Add Admin</h3>
            <div class="container2">
                <form action="" method="POST">
                    <table class="tbladdadmin">
                        <tr>
                            <td>Fullname</td>
                            <td><input type="text" placeholder="Enter your full name" name="full_name"></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><input type="text" placeholder="Enter your username" name="username"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" placeholder="Enter your Password" name="password"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" value="Add Admin" class="btn-primery" name="submit">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
include ('repeat2/footer.php');
?>
