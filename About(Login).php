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
   <title>About</title>

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

<div class="heading" style="background:url(images/header-bg-1.jpg) no-repeat">
   <h1 style="font-family: 'Times New Roman', Times, serif;">about us</h1>
</div>

<!-- about section starts  -->
<section class="about">
   <div class="content">
      <h3 style="font-size: 3rem ;font-family: 'Times New Roman', Times, serif">WHY TO CHOOSE US?</h3>

      <p style="font-size: 2.5rem;;font-family: 'Times New Roman', Times, serif">BOTHER LESS,TRAVEL MORE..</p><br>

      <p>The ESCAPE is an online tour platform that brings high-value and rewarding tour experiences to people all over the world through THE ESCAPE website. 
      Our mission is to empower everyone to be a traveler by offering affordable deals on hotels, pickup, activities, and more, with an The ESCAPE booking experience that is hassle-free from start to finish.
      Since the  company was founded in 2022, we’ve made searching and booking tas easy and stress-free as it should be.</p>

      <p style="font-size: 2.5rem;font-weight:bold;color:black;text-decoration:underline;;font-family: 'Times New Roman', Times, serif">OUR MISSION</p><br>

      <p>Through travel, we connect people to positive experiences enabling them to see the world differently.
      Our goal is to provide authentic and thought-provoking local experiences through our tours and to use the profits to create change in our communities.</p>
   </div>
   <div class="image">
      <img src="images/para1.jpg" alt="">
   </div>

   <div class="content">

      <p style="font-size: 2.5rem;font-weight:bold;color:black;text-decoration:underline;;font-family: 'Times New Roman', Times, serif">OUR VISION</p><br>
      <p>Tourism which is ethical, fair and a positive experience for both travellers and the people and places they visit.The ESCAPE seeks to enhance the corporate management tools to improve the service while reducing your travel costs. We manage almost every type of travel needs, from simplest to the complex, and create an unparalleled experience that our customers could rely on. We aim to maintain our vision of high class travel services at reasonable prices through consistent leadership, controlled growth and excellent commitment.Keeping our vision, “value for money & client satisfaction” as a compass. Through continuous investments in contemporary travel related technology and quality assurance, 
      Hence there will be a need to not only firmly establish ourselves on the market, but also strongly differentiate ourselves from these other businesses. The ESCAPE is one of the few organizations that can offer all over the INDIA a full spectrum of tourism services with flexible and efficient solutions, as a one stop supplier. The services we provide are of a high standard as well as to save both time and money. We invite you to share our vision and benefit from our expertise, professionalism, flexibility, personalized approach, strong purchasing power and comprehensive product portfolio.</p><br>

      <p style="font-size: 2.5rem;font-weight:bold;color:black;text-decoration:underline;;font-family: 'Times New Roman', Times, serif">TRANSPORTATION SAFETY TIPS:</p><br>
      <p>While traveling you should always keep in mind certain transportation safety tips as well:-
      Always choose the safest mode of transport for traveling. Do check its previous safety track record.
      Be mindful of other passengers traveling with you and never hesitate to report any suspicious act to the concerned authorities.
      Never share cab or taxi with strangers. As carjacking is the biggest threat for a traveler.
      Wear money belts, hidden neck and waist pouches, hidden pocket wallets and zippered compartments under your clothes to avoid pick pocketing.</p><br>

      <p style="font-size: 2.5rem;font-weight:bold;color:black;text-decoration:underline;;font-family: 'Times New Roman', Times, serif">HOTEL SAFETY TIPS:</p><br>

      <p>Choosing the safest accommodation at an unknown place could be a biggest concern for you. Therefore be aware of certain tips while choosing a safest hotel for your self.
      Never hesitate to choose the best and safest hotel in town.
      Always carry all the important documents with you while going out of your hotel room.
      Double check window and door locks before leaving the hotel room.
      Prefer to keep your important luggage at receptions locker.
      Get well versed with emergency exits, fire escapes, emergency stairwells to be used in case of emergency.
      To make most out of your trip these basic general safety tips can prove to be very helpful.</p>

      <div class="icons-container">
         <div class="icons">
            <i class="fas fa-map"></i>
            <span style="font-size: 2.5rem;font-weight:bold;color:black ;font-family: 'Times New Roman', Times, serif;">Top Destinations</span>
         </div>
         <div class="icons">
            <i class="fas fa-hand-holding-usd"></i>
            <span style="font-size: 2.5rem;font-weight:bold;color:black;font-family: 'Times New Roman', Times, serif;">Affordable Price</span>
         </div>
         <div class="icons">
            <i class="fas fa-headset"></i>
            <span style="font-size: 2.5rem;font-weight:bold;color:black;font-family: 'Times New Roman', Times, serif;">24/7 Guide Service</span>
         </div>
      </div>
   </div>

</section>
<!-- about section ends -->

<!-- reviews section starts  -->
<section class="reviews">

   <h1 class="heading-title" style="font-family: 'Times New Roman', Times, serif;"> clients reviews </h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

      <?php
         $s="select * from feedback_details";
         $result=mysqli_query($conn,$s);
         $r=mysqli_num_rows($result);

         while($data=mysqli_fetch_array($result))
         { 
            $cname="select * from book_details WHERE `Book_Id`='$data[1]' ";
            $cresult=mysqli_query($conn,$cname);
            $cdata=mysqli_fetch_array($cresult);

            echo  "<div class='swiper-slide slide'>
                  <div class='stars'>";?>
            <?php 
               for ($i = 0; $i < $data[3]; $i++) 
               {
                  echo "<i class='fas fa-star'></i>";
               }
               ?>
            <?php
               echo"</div>
                  <p>$data[2]</p>
                  <h3>$cdata[1]</h3>
                  <img src='images/user.png' alt=''>
               </div>";
         }
      ?>
      </div>
   </div>

</section>
<!-- reviews section ends -->

<!-- footer section starts  -->
<?php include('Footer(Login).php'); ?>
<!-- footer section ends -->

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>