<?php
session_start();
    include('Conn.php');
  
    if(isset($_GET['token']))
    {

      $token = $_GET['token']; 
      $updatequery = " UPDATE customer_details SET status='active' WHERE token='$token' ";

      $query = mysqli_query($conn,$updatequery);
      
      if($query)
      {
        echo "<script>
        alert('Account activated successfully');
        window.location.href='Home.php';
        </script>";
      }
      else{
        echo "<script>
        alert('You are not activated');
        window.location.href='Home.php';
        </script>";
      }
    }
    else{
      echo "<script>
      alert('Account not updated');
      window.location.href='Home.php';
      </script>";
    }
    
?>