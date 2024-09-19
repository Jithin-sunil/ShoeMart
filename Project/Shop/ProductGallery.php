<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Add Product Gallery</title>
</head>

<?php
ob_start();
session_start();
include('../Assets/Connection/Connection.php');

if (isset($_POST["btn_save"])) {
    $productId = $_GET["id"]; // Assuming you are passing the product ID through URL
    $img = $_FILES["file_img"]["name"];
    $temp = $_FILES["file_img"]["tmp_name"];
    
    move_uploaded_file($temp, '../Assets/Files/ProductGallery/' . $img);

    $insqry = "INSERT INTO tbl_productgallery(product_id, gallery_image) 
               VALUES('$productId', '$img')";
    if($con->query($insqry)) {
        echo "<script>alert('Product Image Added Successfully')</script>";
        header("location:ProductGallery.php?id=$productId");
    }
}
?>

<body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td colspan="2" align="center"><h3>Add Product Gallery</h3></td>
        </tr>
        <tr>
            <td colspan="2">
                <form method="post" enctype="multipart/form-data">
                    <table width="50%" align="center" border="0">
                        <tr>
                            <td><label for="file_img">Product Image</label></td>
                            <td><input required="" type="file" id="file_img" name="file_img" /></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" style="width:100px; border-radius: 10px 5px " name="btn_save" value="Save" />
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
        
        <tr>
            <td colspan="2">
                <!-- Display uploaded images -->
                <table border="1" align="center" cellpadding="10">
                    <thead>
                        <tr style="background-color: #74CBF9">
                            <th>Sl.No</th>
                            <th>Gallery Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $productId = $_GET['id'];
                        $selQry = "SELECT * FROM tbl_productgallery WHERE product_id='$productId'";
                        $rs = $con->query($selQry);
                        while ($data = $rs->fetch_assoc()) {
                            $i++;
                        ?>
                            <tr>
                                <td align="center"><?php echo $i; ?></td>
                                <td align="center">
                                    <img src="../Assets/Files/ProductGallery/<?php echo $data['gallery_image']; ?>" width="150" height="150" />
                                </td>
                                <td align="center">
                                    <a href="DeleteGallery.php?id=<?php echo $data['gallery_id']; ?>&product_id=<?php echo $productId; ?>" class="status_btn">DELETE</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>

    <?php ob_end_flush(); ?>
</body>

</html>
