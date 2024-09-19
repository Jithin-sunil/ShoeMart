<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
$selQry="select *from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_product p on p.product_id=c.product_id where p.shop_id='".$_SESSION["sid"]."' and b.booking_status!='0' and c.booking_status!='0'";
echo $selQry;
$res=$con->query($selQry);
if(isset($_GET["cid"]))

	{
		$upQry="update tbl_booking set booking_status='".$_GET["sts"]."' where booking_id='".$_GET["cid"]."' ";
		if($Conn->query($upQry))
		{
			?>
            <script>
				window.location="ViewBooking.php";
			</script>
            <?php
		}
	}
	?>
    
            	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>


<body>
	<br><br><br><br><br>
<h1 align="center">Order Details</h1>
<div id="tab" align="center">
<div align="center">
  <table  border="1">
    <tr>
      <td>SlNo</td>
      <td>Name</td>
      <td>Photo</td>
      <td>Quantity</td>
      <td>Price</td>
      <td>Total Amount</td>
      <td>Action</td>
    </tr>
    <?php 
	$i=0;
	while($row=$res->fetch_assoc())
	{
		$quantity=$row["cart_quantity"];
		$price=$row["product_price"];
		$totalamount=$quantity*$price;
		$i++;
		?>
        <tr>
            <td><?php echo $i;?></td> 
            <td><?php echo $row["product_name"];?></td> 
            <td><img src="../Assets/Files/Photo/<?php echo $row["product_photo"];?>" width="47" /></td>
            <td><?php echo $row["cart_quantity"];?></td>
            <td><?php echo $row["product_price"];?></td>
            <td><?php echo $totalamount;?></td>
	        <td>
                <?php 
					if($row["booking_status"]==1)
					{
						echo "payment pending....";
					}
					else if($row["booking_status"]==2)
					{
						
						?>
                        payment completed /
                        <a href="ViewBooking.php?cid=<?php echo $row ["booking_id"];?>&sts=3">Pack product</a>
                        <?php 
					}
					else if($row["booking_status"]==3)
					{
						?>
                        product packed /
                        <a href="ViewBooking.php?cid=<?php echo $row ["booking_id"];?>&sts=4">Ship Product</a>
                        <?php 
					}
					else if($row["booking_status"]==4)
					{
						?>
                        product shipped /
                        <a href="ViewBooking.php?cid=<?php echo $row ["booking_id"];?>&sts=5">Product Delivered</a>
                        <?php 
					}
					else if($row["booking_status"]==5)
					{
						?>
                       Order Completed
                        <?php 
					}
					?>
                    </td>
                    
				
       </tr>
<?php
	}
	?>
  </table>
</div>
</div>
</body>
<?php 
include("Foot.php");
ob_flush();
?>
</html>