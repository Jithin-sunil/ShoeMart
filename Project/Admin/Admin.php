<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Management</title>
</head>
<?php
ob_start();
include('../Assets/Connection/Connection.php');
include('Head.php');
if(isset($_POST["btn_save"]))
{
    $name=$_POST["txt_name"];
    $email=$_POST["txt_email"];
    $password=$_POST["txt_password"];

    $insqry="INSERT INTO tbl_admin(admin_name, admin_email, admin_password) VALUES('$name','$email','$password')";
    $con->query($insqry);  
}
if(isset($_GET["id"]))
{
    $id=$_GET["id"];
    $delqry="DELETE FROM tbl_admin WHERE admin_id=$id";
    $con->query($delqry);
    header("location:Admin.php");
}   
?>
<body>
    <section class="main_content dashboard_part">
        <div class="container-fluid p-0">
            <!-- Admin Management Table Form -->
            <table border="1" align="center" cellpadding="10" cellspacing="0" style="width:60%; margin-top:30px; background-color: #f9f9f9;">
                <thead>
                    <tr>
                        <th colspan="2" style="text-align:center; background-color: #74CBF9;">
                            <h3>Admin Management</h3>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <form method="post" enctype="multipart/form-data">
                        <tr>
                            <td><label for="txt_name">Admin Name</label></td>
                            <td><input required="" type="text" class="form-control" id="txt_name" name="txt_name"></td>
                        </tr>
                        <tr>
                            <td><label for="txt_email">Admin Email</label></td>
                            <td><input required="" type="email" class="form-control" id="txt_email" name="txt_email"></td>
                        </tr>
                        <tr>
                            <td><label for="txt_password">Password</label></td>
                            <td><input required="" type="password" class="form-control" id="txt_password" name="txt_password"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" class="btn-dark" style="width:100px; border-radius: 10px 5px;" name="btn_save" value="Save">
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>

            <!-- Admin List Table -->
            <table border="1" align="center" cellpadding="10" cellspacing="0" style="width:80%; margin-top:30px;">
                <thead>
                    <tr style="background-color: #74CBF9;">
                        <th style="text-align:center;">Sl.No</th>
                        <th style="text-align:center;">NAME</th>
                        <th style="text-align:center;">EMAIL</th>
                        <th style="text-align:center;">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                        $selQry = "SELECT * FROM tbl_admin";
                        $rs =$con->query($selQry);
                        while ($data = $rs->fetch_assoc()) {
                            $i++;
                    ?>
                    <tr>
                        <td align="center"><?php echo $i;?></td>
                        <td align="center"><?php echo $data['admin_name']; ?></td>
                        <td align="center"><?php echo $data['admin_email']; ?></td>
                        <td align="center">
                            <a href="Admin.php?id=<?php echo $data['admin_id']?>" class="status_btn">DELETE</a>
                        </td>
                    </tr>
                    <?php                    
                      }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <?php
    include('Foot.php');
    ob_end_flush();
    ?>
</body>
</html>
