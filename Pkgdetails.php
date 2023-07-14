<?php
   include('Conn.php');
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Package Details</title>

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

   <div class="heading" style="background:url(images/dark.jpg) no-repeat">

      <?php

      $s="select * from package_details where pkg_id='" .$_GET["pkg_id"] . "'";
      $result=mysqli_query($conn,$s);
      $r=mysqli_num_rows($result);
      //echo $r;

      while($data=mysqli_fetch_array($result))
      {
         echo "<h1 style='font-family:Times New Roman'>$data[2]</h1>
         </div>
         <section class='about'>

            <div class='image'>
               <img src='Admin/pkgimg/$data[6]' alt=''>
            </div>
            <div class='image'>
               <img src='Admin/pkgimg/$data[7]' alt=''>
            </div>
            <div class='image'>
               <img src='Admin/pkgimg/$data[8]' alt=''>
            </div>
            
            <div class='content'>
               <h3 style='text-decoration:underline ;font-family:Times New Roman'>SERVICES IN DETAILS</h3>
               <p>$data[4]</p>
               <p>Package Days - $data[9]days</p>
               <p>Package Price - $data[3]/-</p>

               <a href='Book.php?pkg_id=$data[0]' class='btn'>Book now</a>";
      }
      mysqli_close($conn);
      ?>
   </div>

   </section>
   <!-- packages section ends -->

   <!-- footer section starts  -->
   <?php include('Footer(Login).php'); ?>
   <!-- footer section ends -->

   <!-- swiper js link  -->
   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>
</html>