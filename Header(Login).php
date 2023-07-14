<html>
    <head>
      <script>
         function menuToggle()
         {
               const toggleMenu = document.querySelector('.menu');
               toggleMenu.classList.toggle('active')
         }
      </script>
      <style>
         .icons-size{
            color: #333;
            font-size: 14px;
         }    
         .action{
            position: absolute;
            right: 80px;
            top:15px
         }
         .action .profile{
            border-radius: 50%;
            cursor: pointer;
            height: 45px;
            overflow: hidden;
            position: relative;
            width: 45px;
         }
         .action .profile img{
            width: 100%;
            top:0;
            position: absolute;
            object-fit: cover;
            left: 0;
            height: 100%;
         }
         .action .menu{
            background-color:#FFF;
            box-sizing:0 5px 25px rgba(0,0,0,0.1);
            border-radius: 15px;
            padding: 10px 20px;
            position: absolute;
            right: -10px;
            width: 250px;
            transition: 0.5s;
            top: 120px;
            visibility: hidden;
            opacity: 0;
         }
         .action .menu.active{
            opacity: 1;
            top: 80px;
            visibility: visible;
         }
         .action .menu::before{
            background-color:#fff;
            content: '';
            height: 20px;
            position: absolute;
            right: 30px;
            transform:rotate(45deg);
            top:-5px;
            width: 20px;
         }
         .action .menu h3{
            color: #555;
            font-size: 25px;
            font-weight: 600;
            line-height: 1.3em;
            padding: 20px 0px;
            text-align: left;
            width: 100%;
         }
         .action .menu h3 div{
            color: #818181;
            font-size: 14px;
            font-weight: 400;
         }
         .action .menu ul li{
            align-items: center;
            border-top:1px solid rgba(0,0,0,0.05);
            display: flex;
            justify-content: left;
            list-style: none;
            padding: 10px 0px;
         }
         .action .menu ul li img{
            max-width: 20px;
            margin-right: 10px;
            opacity: 0.5;
            transition:0.5s
         }
         .action .menu ul li a{
            display: inline-block;
            color: #555;
            font-size: 14px;
            font-weight: 600;
            padding-left: 15px;
            text-decoration: none;
            text-transform: uppercase;
            transition: 0.5s;
         }
         .action .menu ul li:hover img{
            opacity: 1;
         }
         .action .menu ul li:hover a{
            color:#ff00ff;
         }
      </style>
    </head>
    <body>
        <section class="header">
   
            <a href="Home(Login).php" class="logo">THE ESCAPE</a>

            <nav class="navbar">
                <a href="Home(Login).php">HOME</a>
                <a href="About(Login).php">ABOUT</a>
                <a href="Package(Login).php">PACKAGE</a>
                

                <div class="action">
                    <div class="profile" onclick="menuToggle();">
                        <img src="images/user.png" alt="">
                    </div>

                    <div class="menu">
                        <h3>
                        <?php
                        echo "<p style=\"color:red;text-decoration:bold; font-size:20px;font-style:\">Hello ". $_SESSION["user_name"] ."</p>";
                        ?>
                        </h3>
                        <ul>
                            <li>
                                <span class="material-symbols-outlined">edit</span>
                                <a href="Edit.php">Edit Account</a>
                            </li>
                            <li>
                                <span class="material-symbols-outlined">lock_reset</span>
                                <a href="Extralinks/Passchange.php">Change Password</a>
                            </li>
                            <li>
                                <span class="material-symbols-outlined">import_contacts</span>
                                <a href="Bookdetails.php">Booking Details</a>
                            </li>
                            <li>
                                <span class="material-symbols-outlined">logout</span>
                                <a href="Logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <div id="menu-btn" class="fas fa-bars"></div>

        </section> 
    </body>
</html>