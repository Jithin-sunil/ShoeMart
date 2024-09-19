<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Brand Management</title>
</head>
<?php
ob_start();
include('../Assets/Connection/Connection.php');
include('Head.php');

if(isset($_POST['btn_save']))
{
    $brand = $_POST['txt_brand'];
    $ins = "INSERT INTO tbl_brand(brand_name) VALUES('$brand')";
    if($con->query($ins))
    {
        header("Location:Brand.php");
    }
}

if(isset($_GET['id']))
{
    $del = "DELETE FROM tbl_brand WHERE brand_id = '".$_GET['id']."'";
    if($con->query($del))
    {
        header("Location:Brand.php");
    }
}
?>
<body>
    <section class="main_content dashboard_part">
        <div class="container-fluid p-0">
            <!-- Brand Management Form -->
            <table border="1" align="center" cellpadding="10" cellspacing="0" style="width:60%; margin-top:30px; background-color: #f9f9f9;">
                <thead>
                    <tr>
                        <th colspan="2" style="text-align:center; background-color: #74CBF9;">
                            <h3>Brand Management</h3>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <form method="post">
                        <tr>
                            <td><label for="txt_brand">Brand Name</label></td>
                            <td><input required="" type="text" class="form-control" id="txt_brand" name="txt_brand"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" class="btn-dark" style="width:100px; border-radius: 10px 5px;" name="btn_save" value="Save">
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>

            <!-- Brand List Table -->
            <table border="1" align="center" cellpadding="10" cellspacing="0" style="width:80%; margin-top:30px;">
                <thead>
                    <tr style="background-color: #74CBF9;">
                        <th style="text-align:center;">Sl.No</th>
                        <th style="text-align:center;">Brand</th>
                        <th style="text-align:center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                        $selQry = "SELECT * FROM tbl_brand";
                        $rs = $con->query($selQry);
                        while ($data = $rs->fetch_assoc()) {
                            $i++;
                    ?>
                    <tr>
                        <td align="center"><?php echo $i;?></td>
                        <td align="center"><?php echo $data["brand_name"];?></td>
                        <td align="center">
                            <a href="Brand.php?id=<?php echo $data["brand_id"];?>" class="status_btn">Delete</a>
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
