<?php if(!isset($_SESSION)) { session_start(); } ?>

<html>
<head>
<title>View Places</title>
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

<div style="padding-top:100px; box-shadow:1px 1px 20px black; height:120vh" class="container">
<div style="border-right:0px solid #999; min-height:450px;">
<?php include('left.php'); ?>
</div>




<form method="post">
<table border="0" width="90%" style="position: absolute; margin-top:0vh; margin-left:5vw;" height="300px"  class="tableshadow">
<tr><td class="toptd">View Place</td></tr>
<tr><td align="center" align="top" style="padding-top:10px;">
<table border="0" align="center" width="95%" >
<tr><td style="font-size:15px; padding:5px; font-weight:bold;">ID</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Place Name</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Photo</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Details</td>
</tr>

<?php

$s="select * from place_details";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	
		echo "<tr><td style=' padding:5px;'>$data[0]</td>
		<td style=' padding:5px;'>$data[1]</td>
		<td style=' padding:5px;'><IMG src='pkgimg/$data[2]' style='height:50PX' /></td>
		<td style=' padding:5px;'>$data[3]</td>
		</tr>";

}


?>

</table>
</td></tr></table>

</form>



</div>


</body>
</html>