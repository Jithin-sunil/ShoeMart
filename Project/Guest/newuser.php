<?php
	include("../Assets/Connection/Connection.php");
  session_start();
	if(isset($_POST["btn_submit"]))
	{
		$name=$_POST["txt_name"];
		$gen=$_POST["rad_gender"];
		$contact=$_POST["txt_contact"];
		$email=$_POST["txt_email"];
		$place=$_POST["ddl_place"];
		$password=$_POST["txt_password"];
				
		$photo=$_FILES["file_img"]["name"];
		$temp=$_FILES["file_img"]["tmp_name"];
		move_uploaded_file($temp,'../Assets/Files/User/'.$photo);
    $da=$_POST["txt_address"];    
	  $insqry="INSERT INTO tbl_user(user_name,user_gender,user_contact,user_email,place_id,user_password,user_image,user_deliveryaddress)
     values('$name','$gen','$contact','$email','$place','$password','$photo','$da')";
      if($con->query($insqry))
       {
        
        ?>
        <script>
        alert("Success")
        window.location="login.php";
        </script>
        <?php

       }



	

	}
  include("Head.php");
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New user</title>
</head>
<body>
  <h2>USER REGISTRATION</h2>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="426" border="1">
    <tr>
      <td >Name</td>
      <td width=""><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required/></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="rad_gender" id="rad_gender" value="Male" required />
      <label for="rad_gender">Male 
        <input type="radio" name="rad_gender" id="rad_gender" value="Female" />
      Female</label></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" required pattern="[0-9]{10}" title="Contact Number should only contain 10 numbers" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" required pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" /></td>
    </tr>
    <tr>
      <td>District</td>
      <td><label for="ddl_district" ></label>
        <select  name="ddl_district" id="ddl_district" onchange="getPlace(this.value)" required >
        <option>--SELECT--</option>
        <?php
		$selqry="select * from tbl_district";
		$result=$con->query($selqry);
		while($row=$result->fetch_assoc())
		{
			?>
        <option value="<?php echo $row['district_id'] ?>"><?php echo $row['district_name']?> </option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="ddl_place"></label>
        <select name="ddl_place" id="ddl_place" required>
        <option>--SELECT--</option>
      </select></td>
    </tr>
    <tr>
      <td>DELIVERY ADDRESS</td>
      <td><label for="txt_address"></label>
      <textarea  name="txt_address" id="txt_address" cols="45" rows="5" required></textarea></td>
    </tr>

    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="text" name="txt_password" id="txt_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Confirm password</td>
      <td><label for="txt_conpas"></label>
      <input type="text" name="txt_conpas" id="txt_conpas" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required autocomplete="off"/></td>
    </tr>
    <script>
    var password = document.getElementById("txt_password")
  , confirm_password = document.getElementById("txt_conpas");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
      <tr>
      <td>Photo</td>
      <td><label for="txt_img"></label>
      <input type="file" name="file_img" id="file_img" required/></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
<script src="../Assets/JQ/jQuery.js"></script>
 <script>    
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?pid="+did,
		success: function(a){
			$("#ddl_place").html(a);
		}
	});
}

</script>

</body>
<?php
include("Foot.php");
?>
</html>