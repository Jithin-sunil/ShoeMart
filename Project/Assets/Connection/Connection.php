<?php
$server="localhost";
$username="root";
$password="";
$db="db_shoemart";
$con=mysqli_connect($server,$username,$password,$db);
if(!$con)
{
	echo "connection failed";
}

?>