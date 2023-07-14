<?php
session_start();
    include('../Conn.php');

    if ( !$conn ) 
    {
       die("Connection failed: " . $conn->connect_error() );
    }
    $conn->autocommit(FALSE);  // Sets Autu-commit OFF

    if(isset($_POST['submit']))
    {

        $name = trim( $_POST["name"] );
        $email = trim( $_POST["email"] );
        $ques = trim($_POST["query"]);

        $sql = "INSERT INTO `enquiry_details`(`Name`, `Email`, `Query`) VALUES ('".$name."','".$email."','".$ques."')"; 

        if( !$conn->query($sql) ) // IF any ERROR, when DATABASE INSERT OPERATION
        {
            die("Error INSERTING The Record : " . $conn->error . "<br />");
        }   

        $rows = $conn->affected_rows;      
        $conn->commit();  // Saves Database action permanently
        //Closes connection
        $conn->close();
        if($rows!=0)
        {
            echo "<script>
            alert('Your enquiry successfully submitted.We will contact you through your mail.');
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2&family=Noto+Sans:wght@300&family=Nunito:ital,wght@0,200;0,300;0,700;1,400;1,600&family=Poppins:wght@200;300;400;500&family=Roboto:wght@400;500;700&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Times New Roman", Times, serif;
        }

        body{
            display: flex;
            padding: 0 10px;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            background: linear-gradient(#4facfe,#38f9d7);
        }

        .wrapper{
            width: 620px;
            background: rgba(96, 135, 250, 0.453);
            backdrop-filter: blur(500px);
            border-radius: 20px;
            border: 5px solid white;
        }

        .wrapper .header{
            font-size: 22px;
            font-weight: 600;
            padding: 20px 30px;
            border-bottom: none;
        }

        .wrapper form{
            margin: 35px 30px;
        }

        form .dbl-field{
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            justify-content: space-between;
            
        }

        .dbl-field .field{
            height: 50px;
            width: 90%;  
        }

        form .field input{
            height: 90%;
            width: 111%;
            outline: none;
            padding: 0 18px;
            font-size: 16px;
            border-radius: 10px;
            border: 3px solid #bfbfff;
        }

        form .message{
            position: relative;
        }

        form .message textarea{
            height: 100%;
            width: 100%;
            outline: none;
            padding: 0 18px;
            font-size: 16px;
            border-radius: 10px;
            border: 3px solid #bfbfff;
            min-height: 150px;
            max-height: 300px;
            min-width: 100%;
            max-width: 100%;
            padding: 15px 20px 0 ;
        }

        .button-area button{
            font-size: 18px;
            border: none;
            color: #fff;
            font-weight:bold;
            border-radius: 15px;
            /* background: linear-gradient(#4facfe,#38f9d7); */
            background:#474e40;
            border: 3px solid white;   
            cursor: pointer;
            padding: 13px 25px;
            margin-left: 200px;
        }

        .button-area button:hover{
            background: linear-gradient(grey,#36454F); ;
            border: 3px solid #36454F;
            transition: 0.7s;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1><center>ASK QUESTIONS?</center></h1>
        </div>
        <form action="" method="POST">
            <div class="dbl-field">
                <div class="field">
                    <input type="text" name="name" required placeholder="Enter Your Name">
                    <br><br>
                    <input type="email" name="email" required placeholder="Enter Your Email">
                </div>
            </div>
            
            <br><br><br>
            <div class="message">
                <textarea name="query" placeholder="Write Your Message"></textarea>      
            </div>
            <br>
            <div class="button-area">
                <button type="submit" name="submit"> Send Message</button>
            </div>
        </form>
    </div>
</body>
</html>