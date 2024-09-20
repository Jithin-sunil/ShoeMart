<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Rejected Shops</title>
</head>
<?php  
ob_start();
include('../Assets/Connection/Connection.php');
include('Head.php');


if(isset($_GET["accept"])) {
    $updateQuery = "UPDATE tbl_shop SET shop_status='1' WHERE shop_id='".$_GET['accept']."'";
    $con->query($updateQuery);
    ?>
    <script>
        alert("Shop has been accepted");
        window.location = "VerifiedShop.php";
    </script>
    <?php
}

?>

<body>
    <section class="main_content dashboard_part">
        <h1>Verify Shops</h1>
        <table border="1" align="center" cellpadding="10" cellspacing="0" style="width:80%; margin-top:30px;">
            <thead>
                <tr style="background-color: #74CBF9;">
                    <th style="text-align:center;">SL.NO</th>
                    <th style="text-align:center;">Shop Name</th>
                    <th style="text-align:center;">Place</th>
                    <th style="text-align:center;">District</th>
                    <th style="text-align:center;">Owner</th>
                    <th style="text-align:center;">Email</th>
                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                
                $selQry = "SELECT * FROM tbl_shop s 
                           INNER JOIN tbl_place p ON s.place_id = p.place_id 
                           INNER JOIN tbl_district d ON p.district_id = d.district_id 
                           WHERE shop_status='2'";
                $rs = $con->query($selQry);
                while ($data = $rs->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td align="center"><?php echo $i; ?></td>
                    <td align="center"><?php echo $data["shop_name"]; ?></td>
                    <td align="center"><?php echo $data["place_name"]; ?></td>
                    <td align="center"><?php echo $data["district_name"]; ?></td>
                    <td align="center"><?php echo $data["shop_email"]; ?></td>
                    <td align="center"><?php echo $data["shop_address"]; ?></td>
                    <td align="center"><?php echo $data["shop_contact"]; ?></td>
                    <td align="center"><?php echo $data["shop_img"]; ?></td>
                    <td align="center"><?php echo $data["shop_proof"]; ?></td>
                    <td align="center">
                        
                        <a href="VerifyShop.php?accept=<?php echo $data['shop_id']; ?>" class="status_btn">Accept</a> |
                       
                    </td>
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
