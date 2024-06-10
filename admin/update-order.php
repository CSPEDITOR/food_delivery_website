<?php
    include('repeat2/navbar.php');
?>

<main>
    <div class="container center">
        <div class="small-container center padding">
            <h3>Update Admin</h3>
            

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
    include ('repeat2/footer.php');
?>
