<?php

    session_start();
    include('../Conn.php');
    if(isset($_POST['submit']))
    {
        $email = trim( $_POST["email"] );
        
        $emailquery = " select * from customer_details where Email='$email' ";
        $query = mysqli_query($conn,$emailquery);

        $emailcount = mysqli_num_rows($query);

        if($emailcount)
        {
            $user_data = mysqli_fetch_array($query);

            $user_name = $user_data['Name'];
            $token = $user_data['token'];

            $subject = "Password Reset";
            $body = "Hi, $user_name.To reset your password <a href='http://localhost/travel/Extralinks/Reset_Password.php?token=$token'>Click here</a>";
            $senders_email = "Content-type: text/html\r\n";
           
            if (mail($email, $subject, $body, $senders_email))
            {
                echo"
                <script>
                alert('Check $email to reset your password');
                window.location.href='../Home.php';
                </script>
                ";
            } else {
                echo"
                <script>
                alert('Email sending failed...');
                window.location.href='../Home.php';
                </script>
                ";
            }
        }else{
            echo"
          <script>
              alert('The entered emailid is not found in our database.Please enter a valid email id.');
              window.location.href='Recover_Email.php';
              </script>
              ";
        }
    }

?>