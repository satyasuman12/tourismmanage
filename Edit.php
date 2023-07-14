<?php
	session_start();
	if( !isset($_SESSION["email"]) )
	{
		session_unset();
   	session_destroy();
   	header("location:Home.php?status=3"); //Un-Authorised Access Attempt
   	exit();
	}

	$email = $_SESSION["email"] ;	  
	
	include('Conn.php');

	// Check connection
	if ( !$conn )
	{
	    die("Connection failed: " . $conn->connect_error() );
	}
  // sql to SELECT from table
	$sql_query = "SELECT `Name`, `Contact_Number`, `Email`, `Password` FROM `customer_details` WHERE email='" . $email . "'";	
	$result = $conn->query($sql_query); //Returns the result set
	$user_data = array();
	if ($result->num_rows > 0)
	{
	 	while($row = $result->fetch_assoc())
	 	{
     		$user_data[]=$row['Name'];
     		$user_data[]=$row['Contact_Number'];
     		$user_data[]=$row['Email'];
  		}
	}
	else
	{
	  	$status=1;//LOGIN FAILED
	}
	$result->free_result();  //Free the result set
  $conn->close();	//Closes connection
?>

<!DOCTYPE HTML>  
<html>
<head>
  <title>Edit Profile</title>
  <style>
    
    @import url('https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2&family=Noto+Sans:wght@300&family=Nunito:ital,wght@0,200;0,300;0,700;1,400;1,600&family=Poppins:wght@200;300;400;500&family=Roboto:wght@400;500;700&display=swap');

    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      overflow: hidden;
      font-family: "Times New Roman", Times, serif;
      background: linear-gradient(#4facfe,#38f9d7);
    }

    .center {
      width: 430px;
      margin: 70px auto;
      position: relative;
    }

    .center .header {
      font-size: 14px;
      font-weight: bold;
      color: white;
      padding: 10px 15px 10px 145px;
      background: #5c1769;
      border-bottom: 1px solid #370e3f;
      border-radius: 15px 15px 0 0;
    }

    .center form {
      position: absolute;
      background: white;
      width: 100%;
      padding: 40px 10px 20px 25px;
      box-sizing: border-box;
      border: 1px solid #6d1c7d;
      border-radius: 0 0 15px 15px;
    }

    label{
      padding-Left: 5px;
      font-size: 1.3em;
      font-weight: bold;
    }

    form input {
      height: 50px;
      width: 90%;
      padding: 0 10px;
      border-radius: 10px;
      border: 3px solid silver;
      font-size: 18px;
      outline: none;
    }

    form button{
      height: 50px;
      width: 70%;
      border-radius: 10px;
      border: 3px solid silver;
      font-size: 18px;
      outline: none;
      cursor: pointer;
    }

    form button:hover{
      background-color: #808080 ;
      border: 3px solid #36454F;
      transition: 0.7s;
      cursor: pointer;
    }

    a{
      text-decoration:none;
      color:black
    }
    
  </style>

  <script language="javascript">
	window.history.forward();
  </script>

</head>
<body>  
  
	<div class="center">
    	<div class="header">
     		<h1>Edit Profile</h1>
    	</div>

		<form method="post" action="Edit_Action.php">
      <label for="Name">Name</label>
      <input type="text" name="user_name" value="<?php echo $user_data[0];?>" readonly>  
			<br><br>   
			<label for="Contact Number">Contact Number</label>
      <input type="text" name="contact" value="<?php echo $user_data[1];?>" required>
			<br><br> 
			<label for="Email">Email</label>
      <input type="email" name="email" value="<?php echo $user_data[2];?>" required>
			<br><br> 

      <center><button type="submit" name="edit_profile">Update Profile</button></center>&nbsp;&nbsp;
      
      <center><button><a href="Home(Login).php">Back</a></button></center>
		</form>
	</div>  
</body>
</html>

