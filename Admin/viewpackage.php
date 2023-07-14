<?php if(!isset($_SESSION)) { session_start(); } ?>

<html>
<head>
<title>View Packages</title>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

<link href="style.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body>

<?php
if($_SESSION['loginstatus']=="")
{
	header("location:loginform.php");
}
?>


<?php include('function.php'); ?>


<?php include('top.php'); ?>

<div style=" box-shadow:1px 1px 20px black; height:150vh" class="container">
<div style="border-right:1px solid #999; min-height:450px;">
<?php include('left.php'); ?>
</div>





<form method="post">
<table border="0" width="100%" height="80px" style="transform: scale(0.8);position: absolute; top: 0; left: 0;" class="tableshadow">
<tr><td class="toptd">View Package</td></tr>
<tr><td align="center" valign="top" style="padding-top:10px;">
<table border="0" align="center" width="95%" >
<tr><td style="font-size:15px; padding:5px; font-weight:bold;">ID</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Package Name</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Place Name</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Package Price</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Details</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Cover Photo</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Pic1</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Pic2</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Pic3</td></tr>

<?php

$s="select * from package_details";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
$placeinfo="select * from place_details where Place_id='$data[1]'";
$placequery=mysqli_query($cn,$placeinfo);
$placedata=mysqli_fetch_array($placequery);
	
		echo "<tr><td style=' padding:5px;'>$data[0]</td>
		<td style=' padding:5px;'>$data[2]</td>
		<td style=' padding:5px;'>$placedata[1]</td>
		<td style=' padding:5px;'>$data[3]/-</td>
		<td style=' padding:5px;'>$data[4]</td>
		<td style=' padding:5px;'><IMG src='pkgimg/$data[5]' style='height:50PX' /></td>
		<td style=' padding:5px;'><IMG src='pkgimg/$data[6]' style='height:50PX' /></td>
		<td style=' padding:5px;'><IMG src='pkgimg/$data[7]' style='height:50PX' /></td>
        <td style=' padding:5px;'><IMG src='pkgimg/$data[8]' style='height:50PX' /></td></tr>";

}


?>

</table>

</form>



</div>

</body>
</html>