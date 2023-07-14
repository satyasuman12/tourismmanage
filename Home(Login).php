<?php
   include('Conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

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
<?php
	session_start();
   if (!isset($_SESSION["email"] ))
 	{
 		session_destroy();
 		header("location:Home.php?status=3");
 		exit();
 	}
   if(isset($_REQUEST["status"]))
   {
     if($_REQUEST["status"]==5)
     {
      ?>
        <script>
           alert("User Profile Update Failed!!!");
        </script>
      <?php
      }
   }
?>
<?php include('Header(Login).php'); ?>
<!-- header section ends -->

<script>
   alert("<?php echo $_SESSION['msg']?>");
</script>
<!-- home section starts  -->
<section class="home">

   <div class="swiper home-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide" style="background:url(images/SL1.jpg) no-repeat">
            <div class="content">
               <span>Explore, Discover, Travel</span>
               <h3>Don't be a tourist,be a traveller</h3>
               <a href="Package(Login).php" class="btn">Discover more</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/SL2.jpg) no-repeat">
            <div class="content">
               <span>Explore, Discover, Travel</span>
               <h3>discover the new places</h3>
               <a href="Package(Login).php" class="btn">Discover more</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/waterandboat.jpg) no-repeat">
            <div class="content">
               <span>Explore, Discover, Travel</span>
               <h3>Always take the scenic route</h3>
               <a href="Package(Login).php" class="btn">Discover more</a>
            </div>
         </div>
         
      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>

   </div>

</section>
<!-- home section ends -->

<!-- services section starts  -->
<section class="services">

   <h1 class="heading-title" style="font-family: 'Times New Roman', Times, serif;"> our services </h1>

   <div class="box-container">

      <div class="box">
         <img src="images/icon-1.png" alt="">
         <h3>Adventure</h3>
      </div>

      <div class="box">
         <img src="images/icon-2.png" alt="">
         <h3>Tour Guide</h3>
      </div>

      <div class="box">
         <img src="images/icon-3.png" alt="">
         <h3>Trekking</h3>
      </div>

      <div class="box">
         <img src="images/icon-4.png" alt="">
         <h3>Camp Fire</h3>
      </div>

      <div class="box">
         <img src="images/icon-5.png" alt="">
         <h3>Off Road</h3>
      </div>

      <div class="box">
         <img src="images/icon-6.png" alt="">
         <h3>Camping</h3>
      </div>

   </div>

</section>
<!-- services section ends -->

<!-- home about section starts  -->
<section class="home-about">

   <div class="image">
      <img src="images/trek5.jpg" alt="">
   </div>

   <div class="content">
      <h3 style="font-family: 'Times New Roman', Times, serif;">ABOUT US</h3>
      <p>
         The ESCAPE is an online tour platform that brings high-value and rewarding tour experiences to people all over the world through THE 
         ESCAPE website. 
         Our mission is to empower everyone to be a traveler by offering affordable deals on hotels, pickup, activities, and more, with an The ESCAPE booking experience that is hassle-free from start to finish.
         Since the  company was founded in 2022, we have made searching and booking tas easy and stress-free as it should be. 
      </p>
      <a href="About(Login).php" class="btn">Read more</a>
   </div>

</section>
<!-- home about section ends -->

<!-- home packages section starts  -->
<section class="home-packages">

   <h1 class="heading-title" style="font-family: 'Times New Roman', Times, serif;"> our packages </h1>

   <div class="box-container">

   <?php


$s="select * from place_details";
$result=mysqli_query($conn,$s);
$r=mysqli_num_rows($result);
$n=1;

while($data=mysqli_fetch_array($result))
{
      if($n<4){
      echo "<div class='box'>
         <div class='image'>
            <img src='Admin/pkgimg/$data[2]' alt=''>
         </div>
         <div class='content'>
            <h3>$data[1]</h3>
            <p>$data[3]</p>
            <a href='pkg.php?place_id=$data[0]' class='btn'>Book now</a>
         </div>
      </div>";
      }
      $n=$n+1;

}
mysqli_close($conn);
?>

</div>
   <div class="load-more"><a href="Package(Login).php" class="btn">Load more</a> </div>


</section>
<!-- home packages section ends -->

<!-- home offer section starts  -->
<section class="home-offer">
   <div class="content">
      <h3>OFFER</h3>
      <p>Complete your trip with us and get Amazing Gift Vouchers after completion of the trip.</p>
      <a href="Package(Login).php" class="btn">Book now</a>
   </div>
</section>
<!-- home offer section ends -->

<!-- footer section starts  -->
<?php include('Footer(Login).php'); ?>
<!-- footer section ends -->

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>