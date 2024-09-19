<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Add Product Stock</title>
</head>

<?php
ob_start();
session_start();
include('../Assets/Connection/Connection.php');

if (isset($_POST["btn_save"])) {
    $productId = $_GET["id"]; // Assuming you are passing the product ID through URL
    $stockQuantity = $_POST["stock_quantity"];

    $insqry = "INSERT INTO tbl_stock(product_id, stock_quantity) 
               VALUES('$productId', '$stockQuantity')";
    if ($con->query($insqry)) {
        echo "<script>alert('Stock Added Successfully')</script>";
        header("location:ProductStock.php?id=$productId");
    }
}
?>

<body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td colspan="2" align="center"><h3>Add Product Stock</h3></td>
        </tr>
        <tr>
            <td colspan="2">
                <form method="post">
                    <table width="50%" align="center" border="0">
                        <tr>
                            <td><label for="stock_quantity">Stock Quantity</label></td>
                            <td><input required="" type="number" id="stock_quantity" name="stock_quantity" /></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" style="width:100px; border-radius: 10px 5px" name="btn_save" value="Save" />
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <!-- Display current stock details -->
                <table border="1" align="center" cellpadding="10">
                    <thead>
                        <tr style="background-color: #74CBF9">
                            <th>Sl.No</th>
                            <th>Product ID</th>
                            <th>Stock Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $productId = $_GET['id'];
                        $selQry = "SELECT * FROM tbl_stock WHERE product_id='$productId'";
                        $rs = $con->query($selQry);
                        while ($data = $rs->fetch_assoc()) {
                            $i++;
                        ?>
                            <tr>
                                <td align="center"><?php echo $i; ?></td>
                                <td align="center"><?php echo $data['product_id']; ?></td>
                                <td align="center"><?php echo $data['stock_quantity']; ?></td>
                                <td align="center">
                                    <a href="DeleteStock.php?id=<?php echo $data['stock_id']; ?>&product_id=<?php echo $productId; ?>" class="status_btn">DELETE</a>
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
