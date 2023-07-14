<?php
   include('Conn.php');
   session_start();
   ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Book</title>

   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
   
   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <!-- header section starts  -->
   <?php include('Header(Login).php'); ?>
   <!-- header section ends -->

   <?php
      $email=$_SESSION['email'];
      $cid="select * from customer_details where Email='$email'";
      $cmail=mysqli_query($conn,$cid);
      $c=mysqli_num_rows($cmail);

      $cdata=mysqli_fetch_array($cmail);

      $s="select * from package_details where pkg_id='" .$_GET["pkg_id"] . "'";
      $result=mysqli_query($conn,$s);
      $r=mysqli_num_rows($result);

      $data=mysqli_fetch_array($result);


      date_default_timezone_set("Asia/Kolkata");
      $d = date('Y-m-d');
      $n = $data[9];
      $custid = $cdata[0];
      $pack = $data[0];
   ?>

   <?php
      if(isset($_POST["send"]))
      {
         $tomail= $_POST["email"];
         $send="INSERT INTO `book_details`( `Traveller_Name`, `Mail_id`, `Ph_No`, `Customer_id`, `Address`, `Adhaar_id`, `Guest_No`, `Pkg_id`, `Book_Date`, `Checkin_Date`, `Checkout_Date`, `Payment_Status`, `Status`,`total_price`) VALUES ('" . $_POST["name"] ."','" . $_POST["email"] ."','" . $_POST["phone"] ."','$custid','" . $_POST["address"] ."','" . $_POST["adhaar"] ."','" . $_POST["guests"] ."','".$pack."','".$d."','" . $_POST["arrivals"] ."','" . $_POST["leaving"] ."','1','0','" . $_POST["amount"] ."')";	
         
         mysqli_query($conn,$send);
         mysqli_close($conn);
         
         $subject = "Booking of Your Tour";
         $body = "Hi, 
         Thank u for booking a tour with THE ESCAPE .Your tour will be confirm within 24 hours.
         You will soon receive a confirmation mail as soon as booking is confirmed.  ";
         $senders_email = "From: the.escape.2025@gmail.com";
         if (mail($tomail, $subject, $body, $senders_email)) 
         {
         echo "<script>alert('Package Booked Successfully');</script>";
         header("location:https://book.stripe.com/test_9AQ3cYe5CdYaahW288");
      }else{
         echo "<script>alert('Email sending failed');</script>";
      }
   }
   ?>

   <div class="heading" style="background:url(images/header-bg-3.jpg) no-repeat">
      <h1 style="font-family: 'Times New Roman', Times, serif;">book now</h1>
   </div>


<script>
   function f2(){
      var guests=document.getElementById('g1').value;
      var amount= "<?php print $data[3]; ?>";
      var amount=parseInt(amount);
      var tamount= guests*amount;
      document.getElementById('am').value = tamount;
      
   }

   function f1(){
      var chkin=new Date(document.getElementById('chk1').value);
      var data = "<?php print $n; ?>";
      var data = parseInt(data);
      chkin.setDate(chkin.getDate() + data);
      const isoDateString = chkin.toISOString().split('T')[0];
      document.getElementById('updatedDate').value = isoDateString;
   }
</script>

   <!-- booking section starts  -->
   <section class="booking">
      <h1 class="heading-title" style="font-family: 'Times New Roman', Times, serif;">book your trip</h1>

      <form action="" method="post" class="book-form">
         <div class="flex">
            <div class="inputBox">
               <span> SELECTED PACKAGE :</span>
               <input type="text" value="<?php echo $data[2];?>" name="pkgname" readonly required>
            </div>

            <div class="inputBox">
               <span> NAME :</span>
               <input type="text" value="<?php echo $cdata[1];?>" name="name" required>
            </div>
            
            <div class="inputBox">
               <span>EMAIL :</span>
               <input type="email" value="<?php echo $cdata[3];?>" name="email" required>
            </div>

            <div class="inputBox">
               <span>PHONE :</span>
               <input type="tel" value="<?php echo $cdata[2];?>" name="phone" required>
            </div>

            <div class="inputBox">
               <span>Adhaar :</span>
               <input type="tel" value="" name="adhaar" required>
            </div>

            <div class="inputBox">
               <span>ADDRESS :</span>
               <input type="text" placeholder="Enter Your Address" name="address" required>
            </div>

            <div class="inputBox">
               <span>HOW MANY :</span>
               <input type="number" placeholder="Number Of Guests" name="guests" id="g1" onchange="f2()" required>
            </div>

            <div class="inputBox">
               <span>CHECK-IN DATE :</span>
               <input type="date" id="chk1" onchange="f1()" name="arrivals" required>
            </div>

   <script language="javascript">
   //to lock the past days
   var today = new Date().toISOString().split('T')[0];
   // Set the minimum date to today
   document.getElementById('chk1').setAttribute("min", today);
   </script>
            <div class="inputBox">
               <span>CHECK-OUT DATE :</span>
               <input type="date" name="leaving" id="updatedDate"  value="" readonly required>
               <!-- <p id="updatedDate"></p> -->
            </div>

            <div class="inputBox">
               <span> TOTAL AMOUNT(in rupees) :</span>
               <input type="text" value="<?php echo $data[3];?>/-" name="amount" id="am" readonly required>
            </div>
         </div>

         <center><input type="submit" value="PAY NOW" class="btn" name="send" style="border-radius:15px"></center>
      </form>
   </section>
   <!-- booking section ends -->

   <!-- footer section starts  -->
   <?php include('Footer(Login).php'); ?>
   <!-- footer section ends -->

   <!-- swiper js link  -->
   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>
</body>
</html>