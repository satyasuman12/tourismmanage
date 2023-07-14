<?php if(!isset($_SESSION)) { session_start(); } ?>

<html>
<head>
<title>Add User </title>
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

  $name = trim( $_POST["t1"] );
	$email = trim( $_POST["t2"] );
  $contact = trim( $_POST["t3"] );
  $address = trim($_POST["t4"]);
  $user_name = trim($_POST["t5"]);
  $user_pass = trim( $_POST["t6"] );
  $user_cpass = trim( $_POST["t7"] );
  $user_type = trim( $_POST["s1"] );

  if( $user_cpass === $user_pass )
  {
    $s = "INSERT INTO `user_details`(`Name`, `mailid`, `contact_no`, `Address`, `Username`, `Password`,`Usertype`) VALUES ('".$name."','".$email."','".$contact."','".$address."','".$user_name."','".$user_pass."','".$user_type."')"; 
    mysqli_query($cn,$s);
    mysqli_close($cn);
    echo "<script>alert('New User Account Is Created');</script>";
  }
  else{
    echo "<script>
          alert('Password Not Matched.Please enter correct password');
          </script>"; 
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
      <table border="0" width="500px" height="400px" style="margin-top:4vh; margin-left:20vw;" align="center" class="tableshadow">
        <tr>
          <td colspan="2" class="toptd">Add User</td>
        </tr>
        <tr>
          <td class="lefttxt">Name</td>
          <td><input type="text" name="t1" placeholder="Enter Name"  required></td>
        </tr>
        <tr>
          <td class="lefttxt">Email id</td>
          <td><input type="text" name="t2" placeholder="Enter Email" required></td>
        </tr>
        <tr>
          <td class="lefttxt">Contact Number</td>
          <td><input type="text" name="t3" placeholder="Enter Contact Number" required></td>
        </tr>
        <tr>
          <td class="lefttxt">Address</td>
          <td><input type="text" name="t4" placeholder="Enter Address" required></td>
        </tr>
        <tr>
          <td class="lefttxt">User Name</td>
          <td><input type="text" name="t5" placeholder="Enter Username" required></td>
        </tr>
        <tr>
          <td class="lefttxt">Password</td>
          <td><input type="password" id="pswrd_1" name="t6" placeholder="Enter Password" required></td>
        </tr>
        <tr>
          <td class="lefttxt">Confirm Password</td>
          <td><input type="password" id="pswrd_2" name="t7" placeholder="Confirm Password" required></td>
        </tr>
        <tr>
          <td class="lefttxt">Type of User</td>
          <td><select name="s1" required>
            <option value="">Select</option>
            <option value="Admin">Admin</option>
            <option value="General">General</option>
            <option value="Guide">Guide</option></select></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><button name="sbmt">SAVE</button></td>
        </tr>
      </table>
    </form>
  </div>
</div>
</body>
</html>