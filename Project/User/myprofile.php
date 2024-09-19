<?php
	include("../Assets/Connection/Connection.php");
	session_start();
	$id=$_SESSION['uid'];
	$selqry="SELECT * FROM tbl_user u inner join tbl_place p on u.place_id=p.place_id INNER JOIN tbl_district d on d.district_id=p.district_id where user_id=$id";
	$result=$con->query($selqry);
		$dat=$result->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
   .class{  
        text-transform: uppercase;
   }

  </style>
</head>
<?php
include("Head.php");
?>
<body>
<h2>MY PROFILE</h2>
<form id="form1" name="form1" method="post" action="">
  <table width="316" height="259" border="2">
    <tr>
      <td >PHOTO</td>
      <td width="184"><img src="../Assets/Files/User/<?php echo $dat["user_image"];?>" width="150" /></td>
    </tr>
    <tr>
      <td width="116" class="class">Name</td>
      <td width="184"><?php
      echo $dat['user_name'];
	  ?></td>
    </tr>
    <tr>
      <td class="class">Gender</td>
      <td><?php
      echo $dat['user_gender'];
	  ?></td>
    </tr>
    <tr>
      <td class="class">District</td>
      <td><?php
      echo $dat['district_name'];
	  ?></td>
    </tr>
    <tr>
      <td class="class">Place</td>
      <td><?php
      echo $dat['place_name'];	  ?></td>
    </tr>
    <tr>
      <td class="class">DELIVERY ADDRESS</td>
      <td><?php
      echo $dat['user_deliveryaddress'];	  ?></td>
    </tr>
    <tr>
      <td class="class">Contact</td>
      <td><?php
      echo $dat['user_contact'];
	  ?></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<?php
include("Foot.php");
?>
</body>
</html>