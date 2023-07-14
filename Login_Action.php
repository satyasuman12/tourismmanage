<?php
	session_start();
	//DATABASE OPERATION
	if( isset($_POST["sign_in"]) )	//if submit button clicked
	{    
	  $email = trim( $_POST["email"] );
	  $user_pass =  trim( $_POST["user_pass"] );	
	  
	  include('Conn.php');

	  if ( !$conn )
	  {
	  	die("Connection failed: " . $conn->connect_error() );
	  }
	  // sql to SELECT from table
	  $sql_query = "SELECT Name,Email,Password FROM customer_details where Email='".$email."' and status='active' ";

	  $result = $conn->query($sql_query); //Returns the result set
	  if ($result->num_rows > 0)
	  {
	  	while($row = $result->fetch_assoc())
	  	{
     		if( password_verify($user_pass, $row['Password']) == true)
     		{  
     			$user_name= $row['Name'];
				$email=$row['Email'];
     			$status=0;//LOGIN SUCCESS
     		} 
     		else
     		{
     			$status=1;//LOGIN FAILED
     		}
  		} 
	  }
	  else
	  {
	  	$status=1;//LOGIN FAILED
	  }
	  $result->free_result();  //Free the result set
   	  $conn->close();	//Closes connection

   	  if($status==0)
   	  {
   	  	$_SESSION["user_name"] = $user_name ;
   	  	$_SESSION["email"]   = $email  ;
   	  	header("location:Home(Login).php?status=0"); //LOGIN SUCCESS
   	  	exit();
   	  }
   	  else
   	  {
   	  	session_unset();
   	  	session_destroy();
   	  	header("location:Home.php?status=1"); //Invalid User or Password 
   	  	exit();
   	  }
	}
?>