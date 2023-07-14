<?php if(!isset($_SESSION)) { session_start(); } ?>


<html>
<head>
<title>View Feedback</title>
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

<div style="padding-top:100px; box-shadow:1px 1px 20px black; min-height:570px" class="container">
<div style="border-right:0px solid #999; min-height:450px;">
<?php include('left.php'); ?>
</div>


<form method="post">
<table border="0" width="500px" height="500px" style="margin-top:0vh; margin-left:20vw;" align="center" class="tableshadow">
<tr><td class="toptd">View Feedback</td></tr>
<tr><td align="center" align="top" style="padding-top:10px;">
<table border="0" align="center" width="95%" >
<tr><td style="font-size:15px; padding:5px; font-weight:bold;">ID</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Book ID</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Feedback</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Rating</td>
<?php

$s="select * from feedback_details";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	
		echo "<tr><td style=' padding:5px;'>$data[0]</td>
		<td style=' padding:5px;'>$data[1]</td>
        <td style=' padding:5px;'>$data[2]</td>
		<td style=' padding:5px;'>$data[3]/5</td>";
}
?>
</table>
</td></tr></table>
</form>
</div>
</body>
</html>