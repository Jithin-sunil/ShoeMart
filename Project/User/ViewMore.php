<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");

$selQry="select * from tbl_product where product_id = '".$_GET["vid"]."' ";

 $res=$con->query($selQry);
	  if($row=$res->fetch_assoc())
	  {
      
    

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Viewmore</title>
</head>
<body>
<div align="center">
<h1 align="center">View More</h1>
<br><br><br><br>
<div id="tab">
<form id="form1" name="form1" method="post" action="">
  <table  border="1" align="center">
  <tr>
    <td><table  border="2" align="center">
      <tr>
        <td colspan="2" align="center"><pc><img src="../Assets/Files/Products/<?php echo $row["product_image"];?>" width="200" height="200"/></p></td>
      </tr>
      <tr>
        <td >Name</td>
        <td ><?php echo $row["product_name"];?></td>
      </tr>
      <tr>
        <td >Details</td>
        <td width=400><?php echo $row["product_details"];?></td>
      </tr>
      <tr>
        <td>Price</td>
        <td><?php echo $row["product_price"];?></td>
      </tr>

      <tr>
        <td><a href="ProductGallery.php?id=<?php echo $row['product_id'] ?>"></a></td>
        
      </tr>
    </table></td>
  </tr>
  </table>
</form>
</div>
</body>
<?php 
}
include("Foot.php");
ob_flush();

?>

</html>
