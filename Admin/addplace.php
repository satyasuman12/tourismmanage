<?php if(!isset($_SESSION)) { session_start(); } ?>

<html>
<head>
<title>Add Places</title>
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
<div>




<form method="post" enctype="multipart/form-data">
<table border="0" width="600px" height="300px" style="margin-top:15vh; margin-left:18vw;" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Add Places</td></tr>
<tr><td class="lefttxt">Place Name</td><td><input type="text" name="t1" required pattern="[a-zA-z _]{3,50}" title"Please Enter Only Characters between 3 to 50 for Place Name" /></td></tr>

<tr><td class="lefttxt">Upload Photo</td><td><input type="file" name="t4" /></td></tr>
<tr><td class="lefttxt">Details</td><td><textarea name="t7"></textarea></td></tr>
<tr><td>&nbsp;</td><td ><input type="submit" value="SAVE" name="sbmt" /></td></tr>

</table>
</form>
</div>
</div>

<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$f1=0;
	
	
	$target_dir = "pkgimg/";
	//t4
	$target_file = $target_dir.basename($_FILES["t4"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	//check if image file is a actual image or fake image
	$check=getimagesize($_FILES["t4"]["tmp_name"]);
	if($check!==false) {
		$uploadok = 1;
	}else{
		echo "<script>alert('Image is not available');</script>";
		$uploadok=0;
	}
	//allow certain file formats
	if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
		echo "<script>alert('Image Type Not supported');</script>";
		$uploadok=0;
	}else{
		if(move_uploaded_file($_FILES["t4"]["tmp_name"], $target_file)){
			$f1=1;
	} else{
		echo "<script>alert('Image Uploading Failed...');</script>";
		}
	}
	
	
	
	
		if($f1>0)
		{
	
	
	$s="INSERT INTO `place_details`( `Place_Name`, `Pic`, `Details`, `Status`) VALUES ('" . $_POST["t1"] ."','" . basename($_FILES["t4"]["name"]) . "','" . $_POST["t7"] ."','1')";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('New Package Successfully Added');</script>";
		}
	
		
}
?>

</body>
</html>


