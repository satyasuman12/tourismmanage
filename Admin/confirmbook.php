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

$confirmquery = "UPDATE `book_details` SET `Status`='1' WHERE `Book_Id`='$id'";

$query = mysqli_query($cn,$confirmquery);

		 $subject = "Booking of Your Tour";
         $body = "Hi,
		 This is a confirmation Mail from team Escape.Your booking with bookid-$id is confirmed. Get Ready to Meet all the adventures.
		 Thank you";
         $senders_email = "From: the.escape.2025@gmail.com";
         if (mail($tomail, $subject, $body, $senders_email)) 
         {
			header("location:bookingdetails.php?msg=confirmed");
		 }else{
			echo "<script>alert('Email sending failed');</script>";
		 }


?>