<?php
session_start();

if( isset($_POST["sign_up"]) )	//if submit button clicked
{  
	//FETCH FORM DATA HERE
	$user_name = trim( $_POST["user_name"] );
	$contact = trim( $_POST["contact"] );
	$email = trim( $_POST["email"] );
    $user_pass = trim( $_POST["user_pass"] );
    $user_cpass = trim( $_POST["user_pass1"] );
	$pass = password_hash($user_pass ,PASSWORD_DEFAULT);

    $token = bin2hex(random_bytes(15));
    
    include('Conn.php');
    // Check connection
    if ( !$conn ) 
    {
       die("Connection failed: " . $conn->connect_error() );
    }
    $conn->autocommit(FALSE);  // Sets Autu-commit OFF

    $emailquery = " select * from customer_details where Email='$email' ";
    $query = mysqli_query($conn,$emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0)
    {
        echo "<script>
                alert('Email Already Exists.Please register using another Email');
                window.location.href='Home.php';
                </script>";
    }
    else
    {
        if( $user_cpass === $user_pass )
        {
            $sql = "INSERT INTO `customer_details`(`Name`, `Contact_Number`, `Email`, `Password`, `token`, `status`) VALUES ('".$user_name."','".$contact."','".$email."','".$pass."','".$token."','inactive')"; 

            if( !$conn->query($sql)) // IF any ERROR, when DATABASE INSERT OPERATION
            {
                die("Error INSERTING The Record : " . $conn->error . "<br />");
            }   

            $rows = $conn->affected_rows; 
                
            $conn->commit();  // Saves Database action permanently
            //Closes connection
            $conn->close(); 
            if($rows!=0)
            {

                
                $subject = "Email Activation";
                $body = "Hi, $user_name. To activate your account
                <a href='http://localhost/Travel/activate.php?token=$token'>Click here</a>";
                $senders_email = "Content-type: text/html\r\n";
                
                if (mail($email, $subject, $body, $senders_email)) 
                { 
                    echo "<script>
                    alert('Check $email to activate your account');
                    window.location.href='Home.php';
                    </script>";
                } else 
                {
                    echo "<script>
                    alert('Email sending failed...');
                    window.location.href='Home.php';
                    </script>";
                }
            } 
            else
            {
                header("location:Home.php?status=2");
            }
            exit();
        }
        else
        {
            echo "<script>
                alert('Password Not Matched.Please enter correct password');
                window.location.href='Home.php';
                </script>";   
        }
    }
}
?>