<?php
    include('repeat2/navbar.php');
?>

<main>
    <div class="container center">
        <div class="small-container center padding">
            <h3>Update Admin</h3>

<?php
            //get the id of selected admin
            $id = $_GET['id'];

            //create sql query to get the details
            $sql= "SELECT * FROM tbl_admin WHERE id=$id";

            //execute the query
            $rec = mysqli_query($conn,$sql);

            // check the query it is execute or not 
            if($rec== true)
            {
                // check it ediable 
                $count = mysqli_num_rows($rec);
                if($count == 1)
                {
                    // get the detail 
                    // echo "admin editable";
                    $row = mysqli_fetch_assoc($rec);
                    $full_name = $row['full_name'];
                    $username = $row['user_name'];
                }
                else
                {
                    // redirect the manage admin page 
                    header('location:'.HOMEURL.'admin/manage-admin.php');
                }
            }
?>




            <form action="" method="POST">
                <table class="tbladdadmin">
                    <tr>
                        <td>Full Name : </td>
                        <td><input type="text" name="full_name" value="<?php echo $full_name ?>"></td>
                    </tr>
                    <tr>
                        <td>Username :</td>
                        <td><input type="text" name="username" value="<?php echo $username?>"></td>
                    </tr>
                    <tr >
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id?>">
                            <input type="submit" name="submit" value="Update admin" class="btn-primery">

                        </td>
                    </tr>
                </table>
            </form>
         </div>
    </div>
 </main>


<?php 
    // check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //button clicked
        //get the all values from form to update
        $id = $_POST['id'];
        $fullname = $_POST['full_name'];
        $username = $_POST['username'];

        //create a sql query to update admin
        $sql ="UPDATE tbl_admin SET full_name ='$fullname', user_name = '$username' WHERE id='$id'";

        //execute the Query 
        $rec = mysqli_query($conn,$sql);

        //check the query is execute or not
        if($rec == true)
        {
            //query executed and admin update 
            $_SESSION['update']="Admin update successfully";
            
            // redirect the manage admin page 
            header('location:'.HOMEURL.'admin/manage-admin.php');
        }
        else{
            // failed to update admin 
            $_SESSION['update']="failed to update";

            // redirect the manage admin page 
            header('location:'.HOMEURL.'admin/manage-admin.php');
        }
    }
 
 ?>

<?php
    include ('repeat2/footer.php');
?>
