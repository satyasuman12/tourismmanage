<?php
   include('Conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Package</title>

   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
   
   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   <?php
      session_start();
      if (!isset($_SESSION["email"] ))
      {
         session_destroy();
         echo "<script>
         alert('Please Login To Book Our Packages...');
         window.location.href='Home.php';
         </script>";
         exit();
      }
   ?>

   <!-- header section starts  -->
   <?php include('Header(Login).php'); ?>
   <!-- header section ends -->

   <div class="heading" style="background:url(images/header-bg-5.jpg) no-repeat">
      <h1 style="font-family: 'Times New Roman', Times, serif;">packages</h1>
   </div>

   <!-- packages section starts  -->
   <section class="packages">
      <h1 class="heading-title" style="font-family: 'Times New Roman', Times, serif;">PACKAGES</h1>
      <div class="box-container">

         <?php

            $s="select * from package_details where place_id='" .$_GET["place_id"] . "'";
            $result=mysqli_query($conn,$s);
            $r=mysqli_num_rows($result);
            //echo $r;

            while($data=mysqli_fetch_array($result))
            {
               echo "<div class='box'>
                  <div class='image'>
                     <img src='Admin/pkgimg/$data[5]' alt=''>
                  </div>
                  <div class='content'>
                     <h3>$data[2]</h3>
                     <p>Package Days - $data[9]days</p>
                     <p>Package Price - $data[3]/-</p>
                     <a href='Pkgdetails.php?pkg_id=$data[0]' class='btn' style='border-radius:15px'>Book now</a>
                  </div>
               </div>";

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