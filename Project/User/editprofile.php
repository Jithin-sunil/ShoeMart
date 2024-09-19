<?php
	include("../Assets/Connection/Connection.php");
	session_start();
	$selquery="select * from tbl_user where user_id=$_SESSION[uid]";
	$res=$con->query($selquery);
	$data=$res->fetch_assoc();
	if(isset($_POST["btn_submit"]))
	{
		$name=$_POST["txt_newname"];
		$email=$_POST["txt_newemail"];
		$contact=$_POST["txt_newcontact"];
		$deliveryad=$_POST["txt_newda"];
		$update="update tbl_user set user_name='".$name."',user_email='".$email."',user_contact='".$contact."',user_deliveryaddress='".$deliveryad."' where user_id=$_SESSION[uid]";
		$con->query($update);
		header("location: editprofile.php");
	}
  include("Head.php");
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Edit profile</title>
</head>

<body>
<h2><b>EDIT PROFILE</b></h2>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
  <table width="396" height="277" border="2">
    <tr>
      <td width="138">NAME</td>
      <td width="242"><label for="txt_newname"></label>
      <input type="text" name="txt_newname" id="txt_newname" value="<?php echo $data['user_name'];?>"/></td>
    </tr>
    <tr>
      <td>EMAIL</td>
      <td><label for="txt_newemail"></label>
      <input type="text" name="txt_newemail" id="txt_newemail" value="<?php echo $data['user_email'];?>"/></td>
    </tr>
    <tr>
      <td>DELIVERY ADDRESS</td>
      <td><label for="txt_newda"></label>
      <input type="text" name="txt_newda" id="txt_newda" value="<?php echo $data['user_deliveryaddress'];?>"/></td>
    </tr>
    <tr>
      <td>CONTACT</td>
      <td><label for="txt_newcontact"></label>
      <input type="text" name="txt_newcontact" id="txt_newcontact" value="<?php echo $data['user_contact'];?>" /></td>
    </tr>
    <tr>
      <td height="40" colspan="2"><div align="right">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />  
        <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
<?php
include("Foot.php");
?>
</html>