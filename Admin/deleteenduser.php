<?php if(!isset($_SESSION)) { session_start(); } ?>


<html>
<head>
<title>Delete Customer</title>
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
	$s="delete from customer_details  where Name='" . $_POST["t1"] . "'and Email='" . $_POST["t2"] . "'";
	
	mysqli_query($cn,$s);
	$affected_rows = mysqli_affected_rows($cn);
	
	if($affected_rows != 0)
            {
	echo "<script>alert('Customer Details Deleted Successfully');</script>";
			}else{
				echo "<script>alert('You have selected wrong details');</script>";	
			}
}
?>


<?php include('top.php'); ?>
<!--/sticky-->
<div style="padding-top:100px; box-shadow:1px 1px 20px black; min-height:570px" class="container">
<div  style="border-right:0px solid #999; min-height:450px;">
<?php include('left.php'); ?>
</div>
<div>





<form method="post">
<table border="0" width="500px" height="300px" style="margin-top:0vh; margin-left:20vw;" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Delete Customer</td></tr>
<tr><td class="lefttxt">Select Customer Name</td><td><select name="t1" required><option value="">Select</option>

<?php
$cn=makeconnection();
$s="select * from customer_details";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	
		echo "<option value=$data[1]>$data[1]</option>";
	
}
?>
</select>
</td></tr>
<tr><td class="lefttxt">Select Customer Email</td><td><select name="t2" required><option value="">Select</option>

<?php
$cn=makeconnection();
$s="select * from customer_details";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	
		echo "<option value=$data[3]>$data[3]</option>";
	
}
mysqli_close($cn);



?>

</select>
</td></tr>

<tr><td>&nbsp;</td><td ><input type="submit" value="Delete" name="sbmt" /></td></tr>
</table>
</form>
</div>


</div>
</body>
</html>

