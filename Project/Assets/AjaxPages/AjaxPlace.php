<option>--SELECT--</option>

<?php
	include("../Connection/Connection.php");
	$selqry="SELECT * FROM tbl_place where district_id=".$_GET['pid'];
	$result=$con->query($selqry);
	while($row=$result->fetch_assoc())
	{
	?>
    <option value="<?php echo $row['place_id'] ?>"><?php echo $row['place_name'] ?></option>
    <?php
	}
	?>

