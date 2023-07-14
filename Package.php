<?php
   session_start();
   include('Conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Top Destinations</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   <!-- header section starts  -->
   <?php include('Header.php'); ?>
   <!-- header section ends -->

   <div class="heading" style="background:url(images/header-bg-2.jpg) no-repeat">
      <h1 style="font-family: 'Times New Roman', Times, serif;">packages</h1>
   </div>

   <!-- packages section starts  -->
   <section class="packages">
      <h1 class="heading-title" style="font-family: 'Times New Roman', Times, serif;">top destinations</h1>
      <div class="box-container">
      
         <?php

            $s="select * from place_details";
            $result=mysqli_query($conn,$s);
            $r=mysqli_num_rows($result);

            while($data=mysqli_fetch_array($result))
            {
               echo "<div class='box'>
                  <div class='image'>
                     <img src='Admin/pkgimg/$data[2]' alt=''>
                  </div>
                  <div class='content'>
                     <h3>$data[1]</h3>
                     <p>$data[3]</p>
                     <a href='Pkg.php?place_id=$data[0]' class='btn' style='border-radius:15px'>Book now</a>
                  </div>
               </div>";
            }
            mysqli_close($conn);
         ?>

      </div>
      
   </section>
   <!-- packages section ends -->

   <!-- footer section starts  -->
   <?php include('Footer.php'); ?>
   <!-- footer section ends -->

   <!-- login and registration section starts -->
   <?php include('Log-Reg.php'); ?>
   <!-- login and registration section ends -->

   <!-- swiper js link  -->
   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>
</html>