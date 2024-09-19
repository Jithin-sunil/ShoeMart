<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Product Management</title>
</head>
<?php
ob_start();
session_start();
include('../Assets/Connection/Connection.php');

if (isset($_POST["btn_save"])) {
    $name = $_POST["txt_name"];
    $price = $_POST["txt_price"];
    $details = $_POST["txt_details"];
    $category = $_POST["category"];
    $brand = $_POST["brand"];
    $size = $_POST["size"];
    $color = $_POST["color"];
    $img = $_FILES["file_img"]["name"];
    $temp = $_FILES["file_img"]["tmp_name"];
    
    move_uploaded_file($temp, '../Assets/Files/Products/' . $img);

    $insqry = "INSERT INTO tbl_product(product_name, product_price, product_details, product_image, shop_id, category_id, brand_id, size_id, color_id) 
               VALUES('$name', '$price', '$details', '$img', '" . $_SESSION['sid'] . "', '$category', '$brand', '$size', '$color')";
    if($con->query($insqry)) {
        echo "<script>alert('Product Added Successfully')</script>";
        header("location:Product.php");
    }
}
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $delqry = "delete from tbl_product where product_id=$id";
    $con->query($delqry);
    header("location:Product.php");
}

?>

<body>
    <section class="main_content dashboard_part">
        <table align="center" border="1" cellpadding="10" cellspacing="0" width="80%">
            <tr>
                <td colspan="2" align="center">
                    <h3>Table Product</h3>
                </td>
            </tr>
            <form method="post" enctype="multipart/form-data">
                <tr>
                    <td>Product Name</td>
                    <td><input required="" type="text" name="txt_name"></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select required name="category">
                            <option value="">Select Category</option>
                            <?php
                            $catQry = "SELECT * FROM tbl_category";
                            $catRs = $con->query($catQry);
                            while ($catData = $catRs->fetch_assoc()) {
                                echo "<option value='" . $catData['category_id'] . "'>" . $catData['category_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Brand</td>
                    <td>
                        <select required name="brand">
                            <option value="">Select Brand</option>
                            <?php
                            $brandQry = "SELECT * FROM tbl_brand";
                            $brandRs = $con->query($brandQry);
                            while ($brandData = $brandRs->fetch_assoc()) {
                                echo "<option value='" . $brandData['brand_id'] . "'>" . $brandData['brand_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td>
                        <select required name="size">
                            <option value="">Select Size</option>
                            <?php
                            $sizeQry = "SELECT * FROM tbl_size";
                            $sizeRs = $con->query($sizeQry);
                            while ($sizeData = $sizeRs->fetch_assoc()) {
                                echo "<option value='" . $sizeData['size_id'] . "'>" . $sizeData['size_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>
                        <select required name="color">
                            <option value="">Select Color</option>
                            <?php
                            $colorQry = "SELECT * FROM tbl_color";
                            $colorRs = $con->query($colorQry);
                            while ($colorData = $colorRs->fetch_assoc()) {
                                echo "<option value='" . $colorData['color_id'] . "'>" . $colorData['color_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Product Price</td>
                    <td><input required="" type="text" name="txt_price"></td>
                </tr>
                <tr>
                    <td>Product Image</td>
                    <td><input required="" type="file" name="file_img"></td>
                </tr>
                <tr>
                    <td>Product Details</td>
                    <td><textarea required name="txt_details"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btn_save" value="Save" style="width:100px; border-radius: 10px 5px;">
                    </td>
                </tr>
            </form>
        </table>

        <br />

        <table align="center" border="1" cellpadding="10" cellspacing="0" width="80%">
            <thead>
                <tr style="background-color: #74CBF9">
                    <td align="center">Sl.No</td>
                    <td align="center">NAME</td>
                    <td align="center">PRICE</td>
                    <td align="center">IMAGE</td>
                    <td align="center">DETAILS</td>
                    <td align="center">ACTION</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $selQry = "select * from tbl_product";
                $rs = $con->query($selQry);
                while ($data = $rs->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr>
                        <td align="center"><?php echo $i; ?></td>
                        <td align="center"><?php echo $data['product_name']; ?></td>
                        <td align="center"><?php echo $data['product_price']; ?></td>
                        <td align="center">
                            <img src="../Assets/Files/Products/<?php echo $data['product_image']; ?>" width="150" height="150">
                        </td>
                        <td align="center"><?php echo $data['product_details']; ?></td>
                        <td align="center">
                            <a href="Product.php?id=<?php echo $data['product_id'] ?>">DELETE</a>
                            <a href="ProductGallery.php?id=<?php echo $data['product_id'] ?>">Gallery</a>
                            <a href="Stock.php?id=<?php echo $data['product_id'] ?>">Stock</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </section>
    <?php
    ob_end_flush();
    ?>
</body>

</html>
