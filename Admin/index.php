<?php if(!isset($_SESSION)) { session_start(); } ?>
<html>
<head>
<title>Dashboard</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

</head>
<body>


<?php
if($_SESSION['loginstatus']=="")
{
	header("location:loginform.php");
}
?>


<?php include('top.php'); ?>

<div style=" min-height:570px" class="container">
<div style="border-right:0px solid #999;right:250px;padding-right:50px; min-height:450px;">
<?php include('left.php'); ?>
</div>
<div><?php include('card.php'); ?></div>
                


</div>

</body>
</html>