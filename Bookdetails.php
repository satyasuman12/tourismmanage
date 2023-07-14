<?php
include('Conn.php');
session_start();
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Booking Details</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #333;
      color: #fff;
      padding: 5px;
      text-align: center;
      display: flex;
      flex-wrap: wrap;
    }

    h1 {
      margin: 0;
      font-size: 25px;
      font-family: 'Times New Roman', Times, serif;
    }

    main {
      max-width: 800px;
      margin: 0 auto;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
    }

    th, td {
      text-align: left;
      padding: 8px;
      border-bottom: 1px solid #ddd;
      font-size:150%;
      
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    th {
      font-family: 'Times New Roman', Times, serif;
      font-size: 18px;
      background-color: #333;
      color: #fff;
    }

    td:first-child {
      font-weight: bold;
    }

    td:nth-last-child(2) {
      font-weight: bold;
      color: #007bff;
    }
  </style>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
   
  <!-- swiper css link  -->
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- custom css file link  -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php include('Header(Login).php'); ?>
  <header>
      <h1>BOOKING HISTORY</h1>
  </header>
<?php

  //finding the logged in customer id
  $email=$_SESSION['email'];
  $cid="select * from customer_details where Email='$email'";
  $cmail=mysqli_query($conn,$cid);
  $c=mysqli_num_rows($cmail);
  $cdata=mysqli_fetch_array($cmail);
  $custid = $cdata[0];
  //finding the booking details of customer by customer id
  $bookinfo="select * from book_details where Customer_id='$custid'";
  $bookquery=mysqli_query($conn,$bookinfo);
?>

<form method='POST' action=''>
  <table>
    <thead>
      <tr>
        <th>Booking ID</th>
        <th>Traveller Name</th>
        <th>Total Guests</th>
        <th>Package Name</th>
        <th>Booking Date</th>
        <th>Check-in Date</th>
        <th>Check-out Date</th>
        <th>Total Price</th>
        <th>Current Status</th>
        <th>Feedback</th>
      </tr>
    </thead>
    <tbody>
    <?php
      while($bookdata=mysqli_fetch_array($bookquery))
      {  
        //finding pkginfo
        $packinfo="select * from package_details where Pkg_id='$bookdata[8]'";
        $packquery=mysqli_query($conn,$packinfo);
        $packdata=mysqli_fetch_array($packquery);

        echo" <tr>
                <td>  $bookdata[0]</td>
                <td>  $bookdata[1]</td>
                <td>  $bookdata[7]</td>
                <td>  $packdata[2]</td>
                <td>  $bookdata[9]</td>
                <td>  $bookdata[10]</td>
                <td>  $bookdata[11]</td>
                <td>  $bookdata[12]/-</td>
                <td>";?> <?php if ($bookdata[14]==1) {
                                            echo"Confirmed";
                                            } elseif($bookdata[14]==0) {
                                              echo"pending";
                                        }else{
                                            echo"cancelled";
                                        }?><?php echo"</td>
              
                
              <td> <a href='Extralinks/Rating.php?id=$bookdata[0]'>Give Feedback</a></td>
              </tr>";
      }
    ?>
    </tbody>
  </table>
</form>

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
