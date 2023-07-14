<?php if(!isset($_SESSION)) { session_start(); } ?>

<html>
<head>
<title>Update Places</title>
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
	$f1=0;
	
	
	$target_dir = "pkgimg/";
	//t4
	$target_file = $target_dir.basename($_FILES["t4"]["name"]);
	$uploadok = 1;
	if(move_uploaded_file($_FILES["t4"]["tmp_name"], $target_file)){
			$f1=1;
	} 	
}
	 
?>

<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	
	if (empty($_FILES['t4']['name'])) {
	
		$s="update place_details set Place_Name='" . $_POST["t1"] . "',Pic='" . $_POST["h1"] . "',Details='" . $_POST["t7"] . "' where Place_id='" . $_POST["s1"] . "'";
	
}
else
{
	
	
	$s="update place_details set Place_Name='" . $_POST["t1"] . "',Pic='" .  basename($_FILES["t4"]["name"]) . "',Details='" . $_POST["t7"] . "' where Place_id='" . $_POST["s1"] . "'";}
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Place Updated successfully');</script>";
    }

?>

<?php include('top.php'); ?>
<!--/sticky-->
<div style="padding-top:100px; box-shadow:1px 1px 20px black; min-height:570px" class="container">
<div style="border-right:0px solid #999; min-height:450px;">
<?php include('left.php'); ?>
</div>
<div>




<form method="post" enctype="multipart/form-data">
<table border="0" width="600px" height="400px" style="margin-top:10vh; margin-left:20vw;" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Update Places</td></tr>
<tr><td class="lefttxt">Select Places</td><td><select name="s1" required/><option value="Select">Select</option>

<?php
$cn=makeconnection();
$s="select * from place_details";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	if(isset($_POST["show"])&& $data[0]==$_POST["s1"])
	{
		echo"<option value=$data[0] selected>$data[1]</option>";
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
<?php
if(isset($_POST["show"]))
{
$cn=makeconnection();
if($_POST["s1"]=="Select"){
	echo"<script>alert('please select a valid Place Name');</script>";
	return false;
}
else{
$s="select * from place_details where Place_id='" .$_POST["s1"] ."'";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

$data=mysqli_fetch_array($result);
$Placeid=$data[0];
$Placename=$data[1];
$Pic1=$data[2];
$Detail=$data[3];

mysqli_close($cn);
}

}

?>

</td></tr>

<tr><td class="lefttxt">Place Name</td><td><input type="text"  value="<?php if(isset($_POST["show"])){ echo $Placename ;} ?> " name="t1" required pattern="[a-zA-z _]{1,50}" title"Please Enter Only Characters between 1 to 50 for Place Name"/></td></tr>



<tr><td class="lefttxt">Old Pic</td><td><img src="pkgimg/<?php echo @$Pic1; ?>" width="150px" height="50px" />
<input type="hidden" name="h1" value="<?php if(isset($_POST["show"])) {echo $Pic1;} ?>" />
</td></tr>
<tr><td class="lefttxt">Upload Photo</td><td><input type="file" name="t4"/></td></tr>

<tr><td class="lefttxt">Details</td><td><textarea name="t7" /><?php if(isset($_POST["show"])){ echo $Detail ;} ?></textarea></td></tr>
<tr><td>&nbsp;</td><td ><input type="submit" value="Update" name="sbmt" /></td></tr>




</table>
</form>




</div>


</div>



	
		


</body>
</html>


