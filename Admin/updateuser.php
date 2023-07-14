<?php if(!isset($_SESSION)) { session_start(); } ?>


<html>
<head>
<title>Update User</title>
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
	$s="update user_details set Name='" . $_POST["t2"] ."',mailid='" . $_POST["t3"] . "',contact_no='" . $_POST["t4"] ."',Address='" . $_POST["t5"] . "',Password='" . $_POST["t6"] ."',Usertype='" . $_POST["s1"] . "' where User_id='" . $_POST["t1"] . "'";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('User Account Information Updated');</script>";
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
<table border="0" width="500px" height="400px" align="center" style="margin-top:5vh; margin-left:20vw;" class="tableshadow">
<tr><td colspan="2" class="toptd">Update User</td></tr>
<tr><td class="lefttxt">Select User</td><td><select name="t1" required/><option value="Select">Select</option>

<?php
$cn=makeconnection();
$s="select * from user_details";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);

while($data=mysqli_fetch_array($result))
{
	if(isset($_POST["show"])&& $data[0]==$_POST["t1"])
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
if($_POST["t1"]=="Select"){
	echo"<script>alert('please select a valid Username');</script>";
	return false;
}
else{
$s="select * from user_details where User_id='" .$_POST["t1"] ."'";


$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);

$data=mysqli_fetch_array($result);
$Username=$data[1];
$Pass=$data[2];
$Usertype=$data[3];
$Name=$data[4];
$Email=$data[5];
$Contact=$data[6];
$Address=$data[7];

mysqli_close($cn);
}


}

?>

</td></tr>


<tr>
    <td class="lefttxt">Name</td>
    <td><input type="text" name="t2" value="<?php if(isset($_POST["show"])){ echo $Name;} ?>" placeholder="Enter Name"  required></td>
</tr>

<tr>
    <td class="lefttxt">Email id</td>
    <td><input type="text" name="t3" value="<?php if(isset($_POST["show"])){ echo $Email;} ?>" placeholder="Enter Email" required></td>
</tr>

<tr>
    <td class="lefttxt">Contact Number</td>
    <td><input type="text" name="t4" value="<?php if(isset($_POST["show"])){ echo $Contact;} ?>" placeholder="Enter Contact Number" required></td>
</tr>

<tr>
    <td class="lefttxt">Address</td>
    <td><input type="text" name="t5" value="<?php if(isset($_POST["show"])){ echo $Address;} ?>" placeholder="Enter Address" required></td>
</tr>

<tr><td class="lefttxt">Password</td><td><input type="password" name="t6" type="password" value="<?php if(isset($_POST["show"])){ echo $Pass ;} ?>" placeholder="Enter Password" required pattern="[a-zA-z0-9]{1,10}" title"Please Enter Only Characters and numbers between 1 to 10 for Company name"/></td></tr>




<tr><td class="lefttxt">Confirm Password</td><td><input type="password"  name="t7" value="<?php if(isset($_POST["show"])){ echo $Pass ;} ?>" placeholder="Confirm Password" required pattern="[a-zA-z0-9]{1,10}" title"Please Enter Only Characters and numbers between 1 to 10 for Company name"/></td></tr>


<tr><td class="lefttxt">Type of User</td><td><select name="s1" required /><option value="">Select</option>
<option value="Admin" <?php if(isset($_POST["show"])&& $Usertype=="Admin"){ echo "selected"; } ?>>Admin</option>
<option value="General" <?php if(isset($_POST["show"])&& $Usertype=="General"){ echo "selected"; } ?>>General</option>
<option value="Guide" <?php if(isset($_POST["show"])&& $Usertype=="Guide"){ echo "selected"; } ?>>Guide</option>
</select></td></tr>
<tr><td>&nbsp;</td><td ><button name="sbmt" value="Update" id="sbmt">SAVE</button></td></tr>
</table>
</form>
</div>


</div>
</body>
</html>
