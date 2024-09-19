<?php
	include("../Assets/Connection/Connection.php");
	session_start();
	if(isset($_POST["btn_submit"]))
	{
		$opw=$_POST["txt_opw"];
		$npw=$_POST["txt_npw"];
		$cpw=$_POST["txt_cpw"];
		$selqry="SELECT * FROM tbl_user where user_id='".$_SESSION['uid']."'";
		$result=$con->query($selqry);
		$data=$result->fetch_assoc();
		$dopw=$data["user_password"];
		if($dopw==$opw && $npw==$cpw)
		{
			$update="update tbl_user set user_password='".$npw."' where user_id='".$_SESSION['uid']."'";
			$con->query($update);
		}
		else{
           ?>
           <script>
           alert("Password doesn't match")
           window.location("changepassword.php")



           </script>
            <?php




    }
		

	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>Change Password</title>
</head>
<?php
include("Head.php");
?>
<body>
  <h1>CHANGE PASSWORD</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="374" height="256" border="1">
    <tr>
      <td width="143" height="46">OLD PASSWORD</td>
      <td width="215"><label for="txt_opw"></label>
      <input type="text" name="txt_opw" id="txt_opw" /></td>
    </tr>
    <tr>
      <td height="50">NEW PASSWORD</td>
      <td><label for="txt_npw"></label>
      <input type="text" name="txt_npw" id="txt_npw" /></td>
    </tr>
    <tr>
      <td>CONFIRM PASSWORD</td>
      <td><label for="txt_cpw"></label>
      <input type="text" name="txt_cpw" id="txt_cpw" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="right">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" /> 
        <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
</body>
<?php
include("Foot.php");
?>
</html>