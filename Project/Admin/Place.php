<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place Management</title>
</head>
<?php
ob_start();
include('../Assets/Connection/Connection.php');
include('Head.php');

if(isset($_POST['btn_save']))
{
    $place = $_POST['txt_place'];
    $district = $_POST['sel_district'];
    $pinc = $_POST['txt_pincode'];
    
    $ins = "INSERT INTO tbl_place (place_name, district_id, place_pincode) VALUES ('$place', '$district', '$pinc')";
    if($con->query($ins))
    {
        header("Location: place.php");
    }
}

if(isset($_GET['id']))
{
    $del = "DELETE FROM tbl_place WHERE place_id = '".$_GET['id']."'";
    if($con->query($del))
    {
        header("Location: place.php");
    }
}
?>
<body>
    <section class="main_content dashboard_part">
        <div class="container-fluid p-0">
            <!-- Place Management Form -->
            <table border="1" align="center" cellpadding="10" cellspacing="0" style="width:60%; margin-top:30px; background-color: #f9f9f9;">
                <thead>
                    <tr>
                        <th colspan="2" style="text-align:center; background-color: #74CBF9;">
                            <h3>Place Management</h3>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <form method="post">
                        <tr>
                            <td><label for="sel_district">District</label></td>
                            <td>
                                <select class="form-control" name="sel_district" id="sel_district" required>
                                    <option value="">-----Select-----</option>
                                    <?php
                                    $sel = "SELECT * FROM tbl_district";
                                    $row = $con->query($sel);
                                    while($data = $row->fetch_assoc())
                                    {
                                    ?>
                                    <option value="<?php echo $data['district_id']; ?>"><?php echo $data['district_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="txt_place">Place</label></td>
                            <td><input type="text" name="txt_place" id="txt_place" class="form-control" required /></td>
                        </tr>
                        <tr>
                            <td><label for="txt_pincode">Pincode</label></td>
                            <td><input type="text" name="txt_pincode" id="txt_pincode" class="form-control" required /></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" class="btn-dark" style="width:100px; border-radius: 10px 5px;" name="btn_save" value="Save">
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>

            <!-- Place List Table -->
            <table border="1" align="center" cellpadding="10" cellspacing="0" style="width:80%; margin-top:30px;">
                <thead>
                    <tr style="background-color: #74CBF9;">
                        <th style="text-align:center;">Sl.No</th>
                        <th style="text-align:center;">District</th>
                        <th style="text-align:center;">Place</th>
                        <th style="text-align:center;">Pincode</th>
                        <th style="text-align:center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $sel = "SELECT p.place_id, p.place_name, p.place_pincode, d.district_name 
                            FROM tbl_place p 
                            INNER JOIN tbl_district d ON d.district_id = p.district_id";
                    $row = $con->query($sel);
                    while($data = $row->fetch_assoc())
                    {
                        $i++;
                    ?>
                    <tr>
                        <td align="center"><?php echo $i; ?></td>
                        <td align="center"><?php echo $data['district_name']; ?></td>
                        <td align="center"><?php echo $data['place_name']; ?></td>
                        <td align="center"><?php echo $data['place_pincode']; ?></td>
                        <td align="center">
                            <a class="status_btn" href="place.php?id=<?php echo $data['place_id']; ?>">Delete</a>
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
