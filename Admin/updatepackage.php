<?php if(!isset($_SESSION)) { session_start(); } ?>

<html>
<head>
<title>Update Packages</title>
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
	//t6
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
}
?>
<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	
	if (empty($_FILES['t4']['name'])) {
	
		$s="update package_details set Pkg_Name='" . $_POST["t1"] ."',Pkg_Price='" . $_POST["t2"] . "',Details='" . $_POST["t3"] . "',Place_id='" . $_POST["s2"] . "',P_Photo='" . $_POST["h1"] . "',P_Photo1='" . $_POST["h2"]. "',P_Photo2='" .$_POST["h3"] . "',P_Photo3='" . $_POST["h4"] . "',P_days='" . $_POST["t8"] ."' where Pkg_id='" . $_POST["s1"] . "'";
	
}
else
{
	
	
	$s="update package_details set Pkg_Name='" . $_POST["t1"] ."',Pkg_Price='" . $_POST["t2"] . "',Details='" . $_POST["t3"] . "',Place_id='" . $_POST["s2"] . "',P_Photo='" .  basename($_FILES["t4"]["name"]) . "',P_Photo1='" .  basename($_FILES["t5"]["name"]) . "',P_Photo2='" .  basename($_FILES["t6"]["name"]) . "',P_Photo3='" .  basename($_FILES["t7"]["name"]) . "',P_days='" . $_POST["t8"] ."' where Pkg_id='" . $_POST["s1"] . "'";}
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Package Successfully Updated..');</script>";
    }

?>


<?php include('top.php'); ?>
<!--/sticky-->
<div style="padding-top:100px; box-shadow:1px 1px 20px black; height:180vh" class="container">
<div style="border-right:0px solid #999; min-height:450px;">
<?php include('left.php'); ?>
</div>

<form method="post" enctype="multipart/form-data">
<table border="0" width="600px" height="400px" style="margin-top:4vh; margin-left:20vw;" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Update Packages</td></tr>
<tr><td class="lefttxt">Select Package</td><td><select name="s1" required/><option value="Select">Select</option>

<?php
$cn=makeconnection();
$s="select * from package_details";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	if(isset($_POST["show"])&& $data[0]==$_POST["s1"])
	{
		echo"<option value=$data[0] selected>$data[2]</option>";
	}
	else
	{
		echo "<option value=$data[0]>$data[2]</option>";
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
	echo"<script>alert('please select a valid Package Name');</script>";
	return false;
}
else{
$s="select * from package_details where Pkg_id='" .$_POST["s1"] ."'";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

$data=mysqli_fetch_array($result);
$Pkgid=$data[0];
$placeid=$data[1];
$pkgname=$data[2];
$Pkgprice=$data[3];
$Detail=$data[4];
$cpic=$data[5];
$pic1=$data[6];
$pic2=$data[7];
$pic3=$data[8];
$pkgdays=$data[9];

mysqli_close($cn);
}

}

?>

</td></tr>

<tr><td class="lefttxt">Package Name</td><td><input type="text"  value="<?php if(isset($_POST["show"])){ echo $pkgname ;} ?> " name="t1" required pattern="[a-zA-z _]{1,50}" title"Please Enter Only Characters between 1 to 50 for Package Name"/></td></tr>
<tr><td class="lefttxt">Package Price</td><td><input type="text"  value="<?php if(isset($_POST["show"])){ echo $Pkgprice ;} ?>" name="t2" required pattern="[0-9]{1,50}" title"Please Enter Only Numbers  for Package price"/></td></tr>
<tr><td class="lefttxt">Details</td><td><textarea name="t3" /><?php if(isset($_POST["show"])){ echo $Detail ;} ?></textarea></td></tr>

<tr><td class="lefttxt">Select Place</td><td><select name="s2"  value="<?php if(isset($_POST["show"])){ echo $placeid ;} ?> " required="required" pattern="[a-zA-z1 _]{1,50}" title"Please Enter Only Characters and numbers between 1 to 50 for Place Name"/><option value="Select">Select</option>

<?php
$cn=makeconnection();
$s="select * from place_details";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	if(isset($_POST["show"]) && $data[0]==$placeid)
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


<tr><td class="lefttxt">Old Pic</td><td><img src="pkgimg/<?php echo @$cpic; ?>" width="150px" height="100px" / >
<input type="hidden" name="h1" value="<?php if(isset($_POST["show"])) {echo $cpic;} ?>" /></td></tr>
<tr><td class="lefttxt">Upload cover photo</td><td><input type="file" name="t4"required/></td></tr>

<tr><td class="lefttxt">Old Pic</td><td><img src="pkgimg/<?php echo @$pic1; ?>" width="150px" height="100px" / >
<input type="hidden" name="h2" value="<?php if(isset($_POST["show"])) {echo $pic1;} ?>" /></td></tr>
<tr><td class="lefttxt">Upload cover photo</td><td><input type="file" name="t5"required/></td></tr>

<tr><td class="lefttxt">Old Pic</td><td><img src="pkgimg/<?php echo @$pic2; ?>" width="150px" height="100px" / >
<input type="hidden" name="h3" value="<?php if(isset($_POST["show"])) {echo $pic2;} ?>" /></td></tr>
<tr><td class="lefttxt">Upload cover photo</td><td><input type="file" name="t6"required/></td></tr>

<tr><td class="lefttxt">Old Pic</td><td><img src="pkgimg/<?php echo @$pic3; ?>" width="150px" height="100px" / >
<input type="hidden" name="h4" value="<?php if(isset($_POST["show"])) {echo $pic3;} ?>" /></td></tr>
<tr><td class="lefttxt">Upload cover photo</td><td><input type="file" name="t7"required/></td></tr>

<tr><td class="lefttxt">Package Days</td><td><input type="text"  value="<?php if(isset($_POST["show"])){ echo $pkgdays ;} ?> " name="t8" required pattern="[0-9]{1,50}" title"Please Enter Only Numbers  for Package Days"/></td></tr>


<tr><td>&nbsp;</td><td ><input type="submit" value="UPDATE" name="sbmt" /></td></tr>




</table>
</form>



</div>



</body>
</html>


