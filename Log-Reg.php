<html>
    <head></head>
    <body>
        <div class="overlay"></div>
        <div class="wrapper">

            <span class="icon-close">
                <ion-icon name="close" ></ion-icon>
            </span>
            <div class="form-box login">
                <h2>LOGIN</h2>
                <form  method="post" action="Login_Action.php">
                    <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                    </div>
                    <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="user_pass" required>
                    <label>Password</label>
                    </div>
                    <div class="remember-forget">
                    <a href="Extralinks/Recover_Email.php" target="_blank" rel="noopener noreferrer">Forget Password?</a>
                    </div>
                    <button type="submit" name="sign_in" class="btpn">Login</button>  
                    <div class="login-register">
                    <p>Don't have an account?<a href="#" class="register-link">  Register</a></p>
                    </div>
                </form>
                <?php
                if(isset($_REQUEST["status"]))
                {
                    if($_REQUEST["status"]==1)
                    {
                ?>
                <script>
                    alert("Invalid Email id or Password!!");
                </script>
                <?php
                    }
                    else if($_REQUEST["status"]==3)
                    {
                ?>
                <script>
                    alert("Un-Authorised Access Attempt!!!");
                </script>
                 <?php
                    }
                }
                ?>
            </div>

            <div class="form-box register">
                <br><h2>REGISTRATION</h2> 
                <form method="post" action="Registration_Action.php">
                    <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="user_name" required>
                    <label>Name</label>
                    </div>
                    <div class="input-box">
                    <span class="icon"><ion-icon name="call"></ion-icon></span>
                    <input type="text" name="contact" required>
                    <label>Contact Number</label>
                    </div>
                    <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                    </div>
                    <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="user_pass" required>
                    <label>Password</label>
                    </div>
                    <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="user_pass1" required>
                    <label>Re-type Password</label>
                    </div>
                    <div class="remember-forget">
                    <label><input type="checkbox" required>Agree to the terms and conditions</label>
                    </div>
                    <button type="submit" name="sign_up" class="btpn">Register</button>  
                    <div class="login-register">
                    <p>Already have an account?<a href="#" class="login-link">Login</a></p>
                    </div>
                </form>
                
                <?php
                if(isset($_REQUEST["status"]))
                {
                    if($_REQUEST["status"]==2)
                    {
                ?>
                <script>
                    alert("User Registration Failed!!");
                </script>
                <?php
                    }
                }
                ?>
            </div>
        </div>


        <script src="js/scri1.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
