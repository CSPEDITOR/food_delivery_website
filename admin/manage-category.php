<?php
    include('repeat2/navbar.php');
?>
<main>
    <div class="container center">
        <div class="small-container center">
            <h3>Manage Category</h3>
            <br>
            <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }
            
            ?>
            <a href="<?php echo HOMEURL; ?>admin/add-category.php" class="btn-primery">Add Category</a>
            <div class="container2">
            <div class="container2">
               <table>
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>User Name</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Chandra Shekhara Prasad</td>
                    <td>cspeditor</td>
                    <td>
                        <a href="#" class="btn-secondary">admin upadate</a>
                        <a href="#" class="btn-danger">admin remove</a>
                </td>
                </tr>       
               </table>
            </div>
            </div>
        </div>
    </div>
</main>
<?php
    include ('repeat2/footer.php');
?>