<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");


$productQuery = "SELECT * FROM tbl_product WHERE product_id = '".$_GET["id"]."'";
$productResult = $con->query($productQuery);

if($productRow = $productResult->fetch_assoc()) {
    
    $galleryQuery = "SELECT * FROM tbl_product_gallery WHERE product_id = '".$_GET["id"]."'";
    $galleryResult = $con->query($galleryQuery);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product Image Gallery</title>
</head>
<body>
<div align="center">
<h1 align="center"><?php echo $productRow["product_name"]; ?> - Image Gallery</h1>
<br><br><br><br>
<div id="gallery">
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center">
    <tr>
      <td align="center">
        <table border="2" align="center">
          <?php
          // Display each image in the gallery
          while($galleryRow = $galleryResult->fetch_assoc()) {
          ?>
            <tr>
              <td align="center">
                <img src="../Assets/Files/ProductGallery/<?php echo $galleryRow["image_name"]; ?>" width="200" height="200" />
              </td>
            </tr>
          <?php
          }
          ?>
        </table>
      </td>
    </tr>
  </table>
</form>
</div>
</div>
</body>
<?php 
}
include("Foot.php");
ob_flush();
?>
</html>
