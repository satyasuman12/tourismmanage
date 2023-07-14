<?php if(!isset($_SESSION)) { session_start(); } ?>

<html>
<head>
<title>Add Packages</title>
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


<form method="post" enctype="multipart/form-data">
<table border="0" width="600px" height="400px" style="margin-top:4vh; margin-left:20vw;" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Add Packages</td></tr>

<tr><td class="lefttxt">Package Name</td><td><input type="text"  value="" name="t1" required pattern="[a-zA-z _]{1,50}" title"Please Enter Only Characters between 1 to 50 for Package Name"/></td></tr>
<tr><td class="lefttxt">Package Price</td><td><input type="text"  value="" name="t2" required pattern="[0-9]{1,50}" title"Please Enter Only Numbers  for Package price"/></td></tr>
<tr><td class="lefttxt">Details</td><td><textarea name="t3" /></textarea></td></tr>

<tr><td class="lefttxt">Upload cover photo</td><td><input type="file" name="t4"required/></td></tr>
<tr><td class="lefttxt">Upload Photo1</td><td><input type="file" name="t5"required/></td></tr>
<tr><td class="lefttxt">Upload Photo2</td><td><input type="file" name="t6"required/></td></tr>
<tr><td class="lefttxt">Upload Photo3</td><td><input type="file" name="t7"required/></td></tr>
<tr><td class="lefttxt">Package Days</td><td><input type="text"  value="" name="t8" required pattern="[0-9]{1,50}" title"Please Enter Only Numbers  for Package Days"/></td></tr>
<tr><td class="lefttxt">Select Places</td><td><select name="s1" required/><option value="Select">Select</option>

<?php
$cn=makeconnection();
$s="select * from place_details";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);


while($data=mysqli_fetch_array($result))
{
	
		echo "<option value=$data[0]>$data[1]</option>";
	
}




?>

</select>

<tr><td>&nbsp;</td><td ><input type="submit" value="ADD" name="sbmt" /></td></tr>




</table>
</form>


</div>

<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$f1=0;
	$f2=0;
	$f3=0;
    $f4=0;
	
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
	
	//aloow certain file formats
	if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
		echo "<script>alert('First Image Type Not supported');</script>";
		$uploadok=0;
	}else{
		if(move_uploaded_file($_FILES["t4"]["tmp_name"], $target_file)){
			$f1=1;
	} else{
		echo "<script>alert('Image Uploading Failed...');</script>";
		}
	}
	
	
	//t5
	$target_file = $target_dir.basename($_FILES["t5"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	//check if image file is a actual image or fake image
	$check=getimagesize($_FILES["t5"]["tmp_name"]);
	if($check!==false) {
		$uploadok = 1;
	}else{
		echo "<script>alert('Image is not available');</script>";
		$uploadok=0;
	}
	
	
	
	//aloow certain file formats
	if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
		echo "<script>alert('Second Image Type Not supported');</script>";
		$uploadok=0;
	}else{
		if(move_uploaded_file($_FILES["t5"]["tmp_name"], $target_file)){
			$f2=1;
	} else{
		echo "<script>alert('Image Uploading Failed...');</script>";
		}
	}
    //t6
	$target_file = $target_dir.basename($_FILES["t6"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	//check if image file is a actual image or fake image
	$check=getimagesize($_FILES["t6"]["tmp_name"]);
	if($check!==false) {
		$uploadok = 1;
	}else{
		echo "<script>alert('Image is not available');</script>";
		$uploadok=0;
	}
	
	
	
	//aloow certain file formats
	if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
		echo "<script>alert('Third Image Type Not supported');</script>";
		$uploadok=0;
	}else{
		if(move_uploaded_file($_FILES["t6"]["tmp_name"], $target_file)){
			$f3=1;
	} else{
			echo "<script>alert('Image Uploading Failed...');</script>";
		}
	}
	//t7
	$target_file = $target_dir.basename($_FILES["t7"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	//check if image file is a actual image or fake image
	$check=getimagesize($_FILES["t7"]["tmp_name"]);
	if($check!==false) {
		$uploadok = 1;
	}else{
		echo "<script>alert('Image is not available');</script>";
		$uploadok=0;
	}
	
	
	//aloow certain file formats
	if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
		echo "<script>alert('Fourth Image Type Not supported');</script>";
		$uploadok=0;
	}else{
		if(move_uploaded_file($_FILES["t7"]["tmp_name"], $target_file)){
			$f4=1;
	} else{
			echo "<script>alert('Image Uploading Failed...');</script>";
		}
	}
	
		if($f1>0 && $f2>0 && $f3>0 && $f4>0)
		{
	
	$s="INSERT INTO `package_details`(`Place_id`, `Pkg_Name`, `Pkg_Price`, `Details`, `P_Photo`, `P_Photo1`, `P_Photo2`, `P_Photo3`, `P_days`, `Status`) VALUES ('" . $_POST["s1"] ."','" . $_POST["t1"] ."','" . $_POST["t2"] ."','" . $_POST["t3"] ."','" . basename($_FILES["t4"]["name"]) . "','" . basename($_FILES["t5"]["name"]) . "','" . basename($_FILES["t6"]["name"]) . "','" . basename($_FILES["t7"]["name"]) . "','" . $_POST["t8"] ."','1')";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('New Package added successfully');</script>";
		}
	
		
}
?>

</body>
</html>


