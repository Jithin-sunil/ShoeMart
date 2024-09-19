<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Complaint</title>
</head>
<?php  
ob_start();
include('../Assets/Connection/Connection.php');
include('Head.php');

if(isset($_POST["btn_save"])) {
    $upQry = "UPDATE tbl_complaint SET complaint_reply='".$_POST["txt_reply"]."', complaint_status='1' WHERE complaint_id='".$_POST["hid"]."'";
    $con->query($upQry);
    header("Location:ViewComplaint.php");
}
?>
<body>
    <section class="main_content dashboard_part">
        <!-- Complaint Management Form -->
        <?php if (isset($_GET["up"])) { ?>
        <table border="1" align="center" cellpadding="10" cellspacing="0" style="width:60%; margin-top:30px; background-color: #f9f9f9;">
            <thead>
                <tr>
                    <th colspan="2" style="text-align:center; background-color: #74CBF9;">
                        <h3>Send Reply</h3>
                    </th>
                </tr>
            </thead>
            <tbody>
                <form method="post">
                    <tr>
                        <td><label for="txt_reply">Reply</label></td>
                        <td><input required="" type="text" class="form-control" id="txt_reply" name="txt_reply"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="hid" value="<?php echo $_GET["up"];?>">
                            <input type="submit" class="btn-dark" style="width:100px; border-radius: 10px 5px;" name="btn_save" value="Save">
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
        <?php } ?>

        <h1>New Complaints</h1>
        <table border="1" align="center" cellpadding="10" cellspacing="0" style="width:80%; margin-top:30px;">
            <thead>
                <tr style="background-color: #74CBF9;">
                    <th style="text-align:center;">SL.NO</th>
                    <th style="text-align:center;">Complaint</th>
                    <th style="text-align:center;">User</th>
                    <th style="text-align:center;">User Email</th>
                    <th style="text-align:center;">Date</th>
                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $selQry = "SELECT * FROM tbl_complaint c INNER JOIN tbl_user u ON c.user_id = u.user_id WHERE complaint_status='0'";
                $rs = $con->query($selQry);
                while ($data = $rs->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td align="center"><?php echo $i; ?></td>
                    <td align="center"><?php echo $data["complaint_content"]; ?></td>
                    <td align="center"><?php echo $data["user_name"]; ?></td>
                    <td align="center"><?php echo $data["user_email"]; ?></td>
                    <td align="center"><?php echo $data["complaint_date"]; ?></td>
                    <td align="center">
                        <a href="ViewComplaint.php?up=<?php echo $data["complaint_id"]; ?>" class="status_btn">Reply</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <h1>Replied Complaints</h1>
        <table border="1" align="center" cellpadding="10" cellspacing="0" style="width:80%; margin-top:30px;">
            <thead>
                <tr style="background-color: #74CBF9;">
                    <th style="text-align:center;">SL.NO</th>
                    <th style="text-align:center;">Complaint</th>
                    <th style="text-align:center;">User</th>
                    <th style="text-align:center;">User Email</th>
                    <th style="text-align:center;">Date</th>
                    <th style="text-align:center;">Reply</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $selQry = "SELECT * FROM tbl_complaint c INNER JOIN tbl_user u ON c.user_id = u.user_id WHERE complaint_status='1'";
                $rs = $con->query($selQry);
                while ($data = $rs->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td align="center"><?php echo $i; ?></td>
                    <td align="center"><?php echo $data["complaint_content"]; ?></td>
                    <td align="center"><?php echo $data["user_name"]; ?></td>
                    <td align="center"><?php echo $data["user_email"]; ?></td>
                    <td align="center"><?php echo $data["complaint_date"]; ?></td>
                    <td align="center"><?php echo $data["complaint_reply"]; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
    <?php
    include('Foot.php');
    ob_end_flush();
    ?>
</body>
</html>
