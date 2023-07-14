<?php
session_start();
ob_start();

    include('../Conn.php');

    if(isset($_POST['submit']))
    {
        if(isset($_GET['token']))
        {

            $token = $_GET['token'];

            $user_pass = trim( $_POST["user_pass"] );
            $user_cpass = trim( $_POST["user_pass1"] );
            $pass = password_hash($user_pass ,PASSWORD_DEFAULT);
            $newtoken = bin2hex(random_bytes(15));

            $tokenquery = " select * from customer_details where token='$token' ";
            $query = mysqli_query($conn,$tokenquery);

            $tokencount = mysqli_num_rows($query);

            if($tokencount)
            {
                if($user_cpass === $user_pass)
                {
                    $updatequery = " update customer_details set Password='$pass',token='$newtoken' where token='$token' ";

                    $iquery = mysqli_query($conn, $updatequery);

                    if($iquery)
                    {
                        echo"
                        <script>
                        alert('Your Password Has Been Updated');
                        window.location.href='../Home.php';
                        </script>
                        ";

                    }else{
                        $_SESSION['passmsg'] = "Your password is not updated";
                        header('location:Reset_Password.php');
                    }
                }else{
                    $_SESSION['passmsg'] = "Your password is not matching"; 
                }

            }else{echo"
                <script>
                alert('Password reset link already expired. Click Forgot password once again');
                window.location.href='../Home.php';
                </script>
                ";
            }
        }else{echo"
            <script>
            alert('No Token Found');
            window.location.href='../Home.php';
            </script>
            ";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>

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
            padding: 10px 15px 10px 20px;
            background: #5c1769;
            border-bottom: 1px solid #370e3f;
            border-radius: 15px 15px 0 0;
        }

        .center form{
            position: absolute;
            background: white;
            width: 100%;
            padding: 50px 10px 0 30px;
            box-sizing: border-box;
            border: 1px solid #6d1c7d;
            border-radius: 0 0 15px 15px;
        }

        form input{
            height: 50px;
            width: 90%;
            padding:  5px 10px;
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
    </style>

</head>
<body>
    <div class="center">
        <div class="header">
            <h2><center>RESET YOUR PASSWORD</center></h2>
        </div>
        <form  action=""  method="POST">
            <div class="">
                <input type="password" name="user_pass" placeholder="Password" required>
            </div>
            <br><br>
            
            <div class="">
                <input type="password" name="user_pass1" placeholder="Re-type Password" required> 
            </div>
            <br>
            <center><button type="submit" name="submit" class="">Reset Password</button></center> <br><br> 
        </form>
    </div>
    <?php 
        if(isset($_SESSION['passmsg']))
        {
        ?>
            <script>
            alert("<?php echo $_SESSION['passmsg']?>" );
            </script>
        <?php
        session_unset();
        }
    ?>
</body>
</html>