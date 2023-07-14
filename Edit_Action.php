<?php
	session_start();
	if( !isset($_SESSION["email"]) )
	{
		session_unset();
   	  	session_destroy();
   	  	header("location:Home.php?status=3"); //Un-Authorised Access Attempt
   	  	exit();
	}
	$email1= $_SESSION["email"];
	if( isset($_POST["edit_profile"]) )
	{//if submit button clicked	 
		//FETCH FORM DATA HERE	
		$user_id = $_SESSION["user_id"]	;
		$contact1 = trim( $_POST["contact"] );		
		$email = trim( $_POST["email"] );
		
		include('Conn.php');
		// Check connection
	    if ( !$conn )
	    {
	       die("Connection failed: " . $conn->connect_error() );
	    }
	    $conn->autocommit(FALSE);  // Sets Autu-commit OFF  
		$sql = "UPDATE `customer_details` SET `Contact_Number`='". $contact1 ."',`Email`='". $email . "' WHERE Email='" . $email1 . "'";  
	    if( !$conn->query($sql) ) // IF any ERROR, when DATABASE INSERT OPERATION
	    {
	    	die("Error UPDATING Record : " . $conn->error . "<br />");
	    }   
	    $rows = $conn->affected_rows;      
	    $conn->commit();  // Saves Database action permanently
		//Closes connection
	    $conn->close(); 
	    if($rows<=3)
	    {
			session_destroy();
	   		header("location:Home.php?status=4"); //USER PROFILE UPDATED SUCCESSFULLY
	    }
	    else
	    {
	   		header("location:Home(Login).php?status=5"); //USER PROFILE UPDATE FAILED
	    }   
	    exit();
    }
?>