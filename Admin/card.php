<?php if(!isset($_SESSION)) { session_start(); } ?>
<?php
if($_SESSION['loginstatus']=="")
{
	header("location:loginform.php");
}
?>


<?php include('function.php'); ?>
<?php

$p="select * from package_details";
$result=mysqli_query($cn,$p);
$r=mysqli_num_rows($result);

$u="select * from customer_details";
$result1=mysqli_query($cn,$u);
$s=mysqli_num_rows($result1);

$f="select * from feedback_details";
$result2=mysqli_query($cn,$f);
$t=mysqli_num_rows($result2);

$e="select * from enquiry_details";
$result3=mysqli_query($cn,$e);
$v=mysqli_num_rows($result3);

$b="select * from book_details";
$result4=mysqli_query($cn,$b);
$w=mysqli_num_rows($result4);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        h3 {
            color: white;
        }
        .container{
            /* width: 100%; */
            height: 50vh;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 90px;
            height: 100px;
        }

        .content-section{
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            flex-wrap: wrap;
        }

        .content-section .cards{
            flex: 1;
            color: white;
            width: 40vh;
            height: 20vh;
            margin: 20px 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .c1{
            background-color: #0492C2;
        }

        .c2{
            background-color: #00563F;
        }

        .c3{
            background-color: #EF9F0F;
        }

        .c4{
            background-color: orangered;
        }
         
    </style>
</head>
<body>
    
    <div class="container">
        <div class="content-section">
            <div class="cards c1" >
                <br>
                <img src="images/customer.png" >
                <h3>USER</h3>
                <br>
                <h3><?php echo "$s"; ?></h3>
            </div>
            <div class="cards c2" >
                <br>
                <img src="images/booking.png" >
                <h3>BOOKING</h3>
                <br>
                <h3><?php echo "$w"; ?></h3>
            </div>
            <div class="cards c3" >
                <br>
                <img src="images/enquiry.png" >
                <h3>ENQUIRIES</h3>
                <br>
                <h3><?php echo "$v"; ?></h3>
            </div>
            <div class="cards c4" >
                <br>
                <img src="images/package.png" >
                <h3>TOTAL PACKAGES</h3>
                <h3><?php echo "$r"; ?></h3>
            </div>
            <div class="cards c2" >
                <br>
                <img src="images/feedback.png" >
                <h3>FEEDBACK</h3>
                <br>
                <h3><?php echo "$t"; ?></h3>
            </div>
        </div>
    </div>
</body>
</html>