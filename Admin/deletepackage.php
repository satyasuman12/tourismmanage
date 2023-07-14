<?php if(!isset($_SESSION)) { session_start(); } ?>

<html>
<head>
<title>Delete Packages</title>
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




<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="delete from package_details  where Pkg_id='" . $_POST["s1"] . "'";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Package deleted Successfully...');</script>";
    }
?>



<?php include('top.php'); ?>
<div style="padding-top:100px; box-shadow:1px 1px 20px black; min-height:570px" class="container">
<div style="border-right:1px solid #999; min-height:450px;">
<?php include('left.php'); ?>
</div>





<form method="post" enctype="multipart/form-data">
<table border="0" width="400px" height="250px" style="margin-top:10vh; margin-left:25vw;" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Delete Packages</td></tr>
<tr><td class="lefttxt">Select Place</td><td><select name="t2" required/><option value="">Select</option>

<?php
$cn=makeconnection();
$s="select * from place_details";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
		if(isset($_POST["show"])&& $data[0]==$_POST["t2"])
		{
		echo "<option value=$data[0] selected>$data[1]</option>";
		}
		else
		{
			echo "<option value=$data[0]>$data[1]</option>";
		}
	
}
mysqli_close($cn);
?>
</select>
<input type="submit" value="Show" name="show" formnovalidate/>



<tr><td class="lefttxt">Select Package</td><td><select name="s1" required/><option value="">Select</option>

<?php
if(isset($_POST["show"]))
{

$cn=makeconnection();
$s="select * from package_details where Place_id='" . $_POST["t2"] ."'";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	
	
		echo "<option value=$data[0]>$data[2]</option>";
	
}
mysqli_close($cn);
}
?>

</select>

</td></tr>

<tr><td>&nbsp;</td><td ><input type="submit" value="Delete" name="sbmt" /></td></tr>

</table>
</form>

</div>



</body>
</html>


             