<?php
include('repeat2/navbar.php');
?>
<main>
    <div class="container center">
        <div class="small-container center padding">
            <h3>Manage Admin</h3>
            <?php
         if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']); //removing the session
            }
         if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']); //removing the session
            }
         if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']); //removing the session
            }
            ?>
            <a href="add-admin.php" class="btn-primery">Add Admin</a>
            <div class="container2">
               <table>
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>User Name</th>
                    <th>Action</th>
                </tr>
                <?php
                $sql = "SELECT * FROM tbl_admin";
                $rec = mysqli_query($conn,$sql);
                if($rec)
                {
                    $sn = 1; // Initialize serial number outside the loop
                    while($rows = mysqli_fetch_assoc($rec)) {
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $user_name = $rows['user_name'];
                        ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $user_name; ?></td>
                            <td>
                                <a href="<?php echo HOMEURL;?>admin/update-admin.php?id= <?php echo $id; ?>" class="btn-secondary">admin update</a>
                                <a href="<?php echo HOMEURL;?>admin/delete-admin.php?id= <?php echo $id; ?>" class="btn-danger">admin remove</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
            ?>
                
               </table>
            </div>
        </div>
    </div>
</main>
<?php
include ('repeat2/footer.php');
?>
