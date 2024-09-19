<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District Management</title>
</head>
<?php
ob_start();
include('../Assets/Connection/Connection.php');
include('Head.php');

if(isset($_POST['btn_save']))
{
    $district = $_POST['txt_district'];
    $ins = "INSERT INTO tbl_district(district_name) VALUES('$district')";
    if($con->query($ins))
    {
        header("Location:district.php");
    }
}

if(isset($_GET['id']))
{
    $del = "DELETE FROM tbl_district WHERE district_id = '".$_GET['id']."'";
    if($con->query($del))
    {
        header("Location:district.php");
    }
}
?>
<body>
    <section class="main_content dashboard_part">
        <div class="container-fluid p-0">
            <!-- District Management Form -->
            <table border="1" align="center" cellpadding="10" cellspacing="0" style="width:60%; margin-top:30px; background-color: #f9f9f9;">
                <thead>
                    <tr>
                        <th colspan="2" style="text-align:center; background-color: #74CBF9;">
                            <h3>District Management</h3>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <form method="post">
                        <tr>
                            <td><label for="txt_district">District Name</label></td>
                            <td><input required="" type="text" class="form-control" id="txt_district" name="txt_district"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" class="btn-dark" style="width:100px; border-radius: 10px 5px;" name="btn_save" value="Save">
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>

            <!-- District List Table -->
            <table border="1" align="center" cellpadding="10" cellspacing="0" style="width:80%; margin-top:30px;">
                <thead>
                    <tr style="background-color: #74CBF9;">
                        <th style="text-align:center;">Sl.No</th>
                        <th style="text-align:center;">District</th>
                        <th style="text-align:center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                        $selQry = "SELECT * FROM tbl_district";
                        $rs = $con->query($selQry);
                        while ($data = $rs->fetch_assoc()) {
                            $i++;
                    ?>
                    <tr>
                        <td align="center"><?php echo $i;?></td>
                        <td align="center"><?php echo $data["district_name"];?></td>
                        <td align="center">
                            <a href="district.php?id=<?php echo $data["district_id"];?>" class="status_btn">Delete</a>
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
