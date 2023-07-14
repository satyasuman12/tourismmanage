<?php
    session_start();
    $id = $_GET['id'];
    include('../Conn.php');

    if ( !$conn )
	  {
	      die("Connection failed: " . $conn->connect_error() );
	  }
        
    $fid="select * from feedback_details WHERE `Book_id`='$id' "; 
    $fdetails=mysqli_query($conn,$fid);
    $f=mysqli_num_rows($fdetails);
    if($f == 0)
    {
      if( isset($_POST["submit"]) )	
      {
        $ratings = trim($_POST["rating"]);
        $message = trim($_POST["message"]);
    
        $fdata=mysqli_fetch_array($fdetails);
          

        $sql = "INSERT INTO `feedback_details`(`Book_id`, `Feedback`, `Ratings`, `Status`) VALUES ('$id','$message','$ratings','1')";

        mysqli_query($conn,$sql);

        $rows = $conn->affected_rows; 
                  
        $conn->commit();  // Saves Database action permanently
        //Closes connection
        $conn->close(); 

        if($rows!=0)
        {
          echo"
          <script>
            alert('Thanks for rating us! 😇');
            window.location.href='../Bookdetails.php';
            </script>
            ";
        }
        exit();
      }
    }else{
        echo"
          <script>
              alert('Feedback For This Booking Has Already Been Submitted... 😇');
              window.location.href='../Bookdetails.php';
              </script>
              ";
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

  <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

    *{
      margin:0;
      padding:0;
      box-sizing: border-box;
      font-family: 'Poppins',sana-serif;
    }
    body{
      display:flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 100vh;
      background-image: linear-gradient(to bottom right,black,#233329,#63D471,#233329,black);
      /* background: url("feedback.jpg") no-repeat; */
      background-size: cover;
      background-position: center;
    }
    .container{
      position: relative;
      width: 400px;
      height: 440px;
      background: transparent;
      border: 2px solid rgba(255,255,255,.5);
      border-radius: 20px;
      backdrop-filter: blur(20px);
      box-shadow: 7px 8px 10px 6px;
      display: flex;
      justify-content:center;
      align-items: center;
      padding-bottom: 15px
    } 

    h2{
      font-size: 2em;
      color: white;
      text-align: center;
      text-shadow: 6px 5px black;
    }

    h3{
    font-size: 1.3em;
      font-weight: 500;
      color: white;
      text-align: center;
    }


    .input-box{
      position: relative;
      width: 310px;
      margin: 30px 0;
      border-bottom: 2px solid whitesmoke;
    }

    .input-box label{
      position: absolute;
      top: 50%;
      left: 5px;
      transform: translateY(-50%);
      font-size: 1.3em;
      font-weight: 500;
      color: white;
      pointer-events: none;
      transition: .5s
    }

    .input-box input:focus~label,
    .input-box input:valid~label {
      top: -5px;
    }

    .input-box input{
      width: 100%;
      height: 50px;
      background: transparent;
      border:none;
      outline:none;
      font-size: 1em;
      color: white;
      padding: 035px 0 5px;
    }

    .input-box .icon{
      position: absolute;
      right: 8px;
      font-size: 1.5em;
      color: white;
      line-height: 57px;
    }

    button{
      width: 100%;
      height: 45px;
      background: white;
      border: none;
      outline: none;
      box-shadow: 5px 6px 10px 3px;
      border-radius: 15px;
      cursor: pointer;
      font-size: 20px;
      color: black;
      font-weight: bold;
    }

    button:hover{
      background-color: #808080 ;
      transition: 0.7s;
      cursor: pointer;
    }

    .star-rating {
        display: inline-block;
        font-size: 0;
        cursor: pointer;
    }

    .star-rating input[type="radio"] {
        display: none;
    }

    .star-rating label {
        display: inline-block;
        font-size: 60px;
        text-align: center;
        color: #DCF3E5;
        margin: 0 2px;
        float: right;
    } 

    .star-rating input[type="radio"]:checked ~ label { 
        color: gold;
        content: "&bigstar";
    }  
  </style>
</head>

<body>
  <div class="container">
      <form  method="post" action=" ">
        <h2>FEEDBACK FORM</h2><br><br>
        <h3>RATE US</h3>
        <center><div class="star-rating">
            <input type="radio" id="star5" name="rating" value="5" />
            <label for="star5" title="5 stars">&starf;</label>
            <input type="radio" id="star4" name="rating" value="4" />
            <label for="star4" title="4 stars">&starf;</label>
            <input type="radio" id="star3" name="rating" value="3" />
            <label for="star3" title="3 stars">&starf;</label>
            <input type="radio" id="star2" name="rating" value="2" />
            <label for="star2" title="2 stars">&starf;</label>
            <input type="radio" id="star1" name="rating" value="1" />
            <label for="star1" title="1 star">&starf;</label>
        </div></center>
        
        <div class="input-box">
          <input type="text" name="message" required>
          <label>DESCRIPTION</label>
        </div><br>
        
        <button type="submit" name="submit" class="btpn">SEND FEEDBACK</button>  
      </form>
    </div>
</form>
</body>
</html>