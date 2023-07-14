<?php if(!isset($_SESSION)) { session_start(); } ?>

<html>
<head>
<title>View bookings</title>
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
if($_GET['msg'] == 'cancelled'){
	echo '<script>alert("Booking Cancelled");</script>';
}
if($_GET['msg'] == 'confirmed'){
	echo '<script>alert("Booking Confirmed");</script>';
}
?>


<?php include('function.php'); ?>


<?php include('top.php'); ?>
<div style=" box-shadow:1px 1px 20px black; height:120vh" class="container">
<div style="border-right:1px solid #999; min-height:450px;">
<?php include('left.php'); ?>
</div>





<form method="post">
<table border="0" height="80px" width="100%" style="transform: scale(0.8);position: absolute; top: 0; left: 0;"  class="tableshadow">
<tr><td class="toptd"> Booking Details</td></tr>
<tr><td align="center" valign="top" style="padding-top:10px;">
<table border="0" align="center" width="95%" >
<tr><td style="font-size:15px; padding:5px; font-weight:bold;">BOOK ID</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Traveller Name</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Mail ID</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Phone NO.</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Address</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Adhaar Id</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Package Name</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Total Guest</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Book Date</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Checkin Date</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Checkout Date</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Total Price</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Status</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Action</td></tr>

<?php

$s="select * from book_details";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
$placeinfo="select * from package_details where Pkg_id='$data[8]'";
$placequery=mysqli_query($cn,$placeinfo);
$placedata=mysqli_fetch_array($placequery);
	
		echo "<tr><td style=' padding:5px;'>$data[0]</td>
		<td style=' padding:5px;'>$data[1]</td>
		<td style=' padding:5px;'>$data[2]</td>
		<td style=' padding:5px;'>$data[3]</td>
		<td style=' padding:5px;'>$data[5]</td>
        <td style=' padding:5px;'>$data[6]</td>
		<td style=' padding:5px;'>$placedata[2]</td>
        <td style=' padding:5px;'>$data[7]</td>
		<td style=' padding:5px;'>$data[9]</td>
		<td style=' padding:5px;'>$data[10]</td>
        <td style=' padding:5px;'>$data[11]</td>
		<td style=' padding:5px;'>$data[12]/-</td>
		<td style=' padding:5px;'>";?><?php if ($data[14]==1) {
                                                         echo"Confirmed";
                                                        } elseif($data[14]==0) {
                                                            echo"pending";
                                                        }else{
                                                            echo"cancelled";
                                                        }?><?php  echo"</td>"; ?>
		<?php if($_SESSION["usertype"] == "Admin" OR $_SESSION["usertype"] =="General")
		{ echo"<td style=' padding:5px;'>
		<a href='confirmbook.php?id=$data[0]'>confirm</a>
        <a href='cancelbook.php?id=$data[0]'>cancel</a></td>
		</tr>";}

}


?>

</table>


</form>



</div>


</body>
</html>