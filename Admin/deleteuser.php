<?php 
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	} 
?>

<html>
<head>
<title>Delete User</title>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

<link href="style.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<!--header-->
<!--sticky-->
<?php
if($_SESSION['loginstatus']=="")
{
	header("location:loginform.php");
}
?>

<?php include('function.php'); ?>
<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="delete from user_details  where Username='" . $_POST["t1"] . "'";
	if($_POST["t1"]=="Owner"){
		echo"<script>alert('Cannot delete Owner details');</script>";
	}
	else
	{
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('User details deleted');</script>";
	}
}
?>

<?php include('top.php'); ?>
<!--/sticky-->
<div style="padding-top:100px; box-shadow:1px 1px 20px black; min-height:570px" class="container">
<div style="border-right:0px solid #999; min-height:450px;">
<?php include('left.php'); ?>
</div>
<div>

<form method="post">
<table border="0" width="500px" height="300px" style="margin-top:15vh; margin-left:20vw;" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Delete User</td></tr>
<tr><td class="lefttxt">Select User</td><td><select name="t1" required/><option value="">Select</option>

<?php
$cn=makeconnection();
$s="select * from user_details";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);


while($data=mysqli_fetch_array($result))
{
	
		echo "<option value=$data[1]>$data[1]</option>";
	
}
mysqli_close($cn);
?>
</select>


</td></tr>

<tr>
	<td></td>
	<td colspan=2 align="center" ><input type="submit" value="Delete" name="sbmt" /></td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>