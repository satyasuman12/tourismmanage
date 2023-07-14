<?php
session_start();
?>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recover Email</title>
    
   <script language="javascript">
	   window.history.forward();
   </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2&family=Noto+Sans:wght@300&family=Nunito:ital,wght@0,200;0,300;0,700;1,400;1,600&family=Poppins:wght@200;300;400;500&family=Roboto:wght@400;500;700&display=swap');

        body{
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
            font-family: "Times New Roman", Times, serif;
            background: linear-gradient(#4facfe,#38f9d7);
        }

        .center{
            width: 430px;
            margin: 130px auto;
            position: relative;
        }

        .center .header{
            font-size: 14px;
            font-weight: bold;
            color: white;
            padding: 10px 15px 10px 80px;
            background: #5c1769;
            border-bottom: 1px solid #370e3f;
            border-radius: 15px 15px 0 0;
        }

        .center form{
            position: absolute;
            background: white;
            width: 100%;
            padding: 10px 10px 0 10px; 
            box-sizing: border-box;
            border: 1px solid #6d1c7d;
            border-radius: 0 0 15px 15px;
        }

        form input{
            height: 50px;
            width: 90%;
            padding:  10px 10px;
            border-radius: 10px;
            border: 3px solid silver;
            font-size: 18px;
            outline: none;
        }

        form button{
            height: 50px;
            width: 50%;
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
        }

        h3{
            text-align:center;
        }
    </style>
</head>
<body>
    <div class="center">
        <div class="header">
            <h2>RECOVER YOUR ACCOUNT</h2>
        </div>
        <form  method="post" action="Recover_Email_Action.php">
            <h3>Enter Your Registered Mail ID</h4>
            <div class="">
                <center><input type="email" name="email" required></center>
            </div>
            <br>
            <center><button type="submit" name="submit" class="">Send Mail</button></center> 
            <div class="">
               <p><b><center>Already have an account?<a href="../Home.php">Login</a></center></b></p>
            </div>
        </form>
   </div>
</body>
</html>