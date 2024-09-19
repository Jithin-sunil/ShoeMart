<?php
include("../Connection/Connection.php");

  $graphics = 0;
  $design = 0;
  $size = 0;



  if(isset($_GET["graphics"]))
  {

    $selCat = "select * from tbl_graphics where graphics_id='".$_GET["graphics"]."'";
    $resultCat=$con->query($selCat);
	if($rowCat=$resultCat->fetch_assoc())
	{
        $graphics = $rowCat["graphics_price"];
    }

  }
  if(isset($_GET["design"]))
  {
    $selIce = "select * from tbl_design where design_id='".$_GET["design"]."'";
    $resultIce=$con->query($selIce);
	if($rowIce=$resultIce->fetch_assoc())
	{
        $design = $rowIce["design_price"];
    }

  }
  if(isset($_GET["size"]))
  {
    $selTop = "select * from tbl_size where size_id='".$_GET["size"]."'";
    $resultTop=$con->query($selTop);
	if($rowTop=$resultTop->fetch_assoc())
	{
        $size = $rowTop["size_price"];
    }

  }
$total = "";

  if($graphics!=0)
  {

    $total =((int) $graphics +(int) $size +(int) $design );

  }
  echo $total;
?>
