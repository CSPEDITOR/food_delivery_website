<?php
    include('repeat2/navbar.php');
?>
<main>
    <div class="container center">
        <div class="small-container center padding">
            <h3>Add category</h3>
            <div class="container2">
                <form action="" method="POST">
                    <table class="tbladdadmin" >
                        <tr>
                            <td>Title</td>
                            <td><input type="text" placeholder="Enter categori title" name="title"></td>
                        </tr>
                        <tr >
                            <td style="vertical-align: top;">featured</td>
                            <td style="display:flex; align-items: center;"><input type="radio" name="featured" value="Yes" style="height:15px;">Yes
                            <input type="radio" name="featured" value="No" style="height:15px;">No</td>
                        </tr>
                        <tr>
                            <td style=" vertical-align: top;">featured</td>
                            <td style="display:flex; align-items: center; "><input type="radio" name="featured" value="Yes" style="height:15px;">Yes
                            <input type="radio" name="featured" value="No" style="height:15px;">No</td>
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