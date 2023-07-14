<?php if(!isset($_SESSION)) { session_start(); } ?>
<?php
if($_SESSION['loginstatus']=="")
{
	header("location:loginform.php");
}
?>
<?php include('function.php'); ?>
<?php

$id = $_GET['id'];

$s="select * from book_details WHERE `Book_Id`='$id' ";
$result=mysqli_query($cn,$s);
$data=mysqli_fetch_array($result);

$tomail= $data[2];

$confirmquery = "UPDATE `book_details` SET `Status`='2' WHERE `Book_Id`='$id'";

$query = mysqli_query($cn,$confirmquery);

		 $subject = "Cancellation of Your Tour";
         $body = "Hi,
		 This a Cancellation message from team Escape .Your booking with bookid-$id is cancelled. We are sorry for the inconvinence.
		 For details about cancellation contact our team in this following mail the.escape.2025@gmail.com";
         $senders_email = "From: the.escape.2025@gmail.com";
         if (mail($tomail, $subject, $body, $senders_email)) 
         {
			header("location:bookingdetails.php?msg=cancelled");
			exit;
		 }else{
			echo "<script>alert('Email sending failed');</script>";
		 }
?>