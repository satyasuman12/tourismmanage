<?php if(!isset($_SESSION)) { session_start(); } ?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.scrollable-section {
  height: 650px;
  overflow: scroll;
}
</style>
</head>

<body>

    <div class="side-menu">
        <div class="brand-name">
        <a href="index.php"><h1 :hover style="background:#f05462;">Dashboard</h1></a>
        </div>
        <div class="scrollable-section">
        <ul>
        <?php if($_SESSION["usertype"]=="Admin")
        {?>

            <a href="adduser.php"><li><img src="images/adduser.png" alt="">&nbsp; <span>Add User</span> </li></a>
            <a href="updateuser.php"><li><img src="images/updateuser.png" alt="">&nbsp;<span>Update User</span> </li></a>
            <a href="deleteuser.php"><li><img src="images/deleteuser.png" alt="">&nbsp;<span>Delete User</span> </li></a>
        <?php }?>
        
        <?php if($_SESSION["usertype"] == "Admin" OR $_SESSION["usertype"] =="General")
        {?>
            <a href="deleteenduser.php"><li><img src="images/deleteuser.png" alt="">&nbsp;<span>Delete Customer</span> </li></a>
            <a href="addplace.php"><li><img src="images/addpackage.png" alt="">&nbsp;<span>Add Places</span> </li></a>
            <a href="updateplace.php"><li><img src="images/updatepackage.png" alt="">&nbsp;<span>Update Places</span> </li></a>
            <a href="deleteplace.php"><li><img src="images/deletepackage.png" alt="">&nbsp; <span>Delete Places</span> </li></a>
            <a href="addpackage.php"><li><img src="images/addpackage.png" alt="">&nbsp;<span>Add Packages</span> </li></a>
            <a href="updatepackage.php"><li><img src="images/updatepackage.png" alt="">&nbsp;<span>Update Packages</span> </li></a>
            <a href="deletepackage.php"><li><img src="images/deletepackage.png" alt="">&nbsp; <span>Delete Packages</span> </li></a>
            <a href="viewfeedback.php"><li><img src="images/viewpackage.png" alt="">&nbsp;<span>View Feedback</span> </li></a>
            <a href="viewenquiry.php"><li><img src="images/viewenquiry.png" alt="">&nbsp;<span>View Enquiry</span> </li></a>
            
        <?php }?>
            <a href="bookingdetails.php"><li><img src="images/deletepackage.png" alt="">&nbsp; <span>Booking Details</span> </li></a>
            <a href="viewpackage.php"><li><img src="images/viewpackage.png" alt="">&nbsp;<span>View Package</span> </li></a>
            <a href="viewplace.php"><li><img src="images/viewpackage.png" alt="">&nbsp;<span>View Places</span> </li></a>
            
        </ul>
    </div>
    </div>




<style>
 * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    min-height: 100vh;
    
}

a {
    text-decoration: none;
}

li {
    list-style: none;
}

h1,
h2 {
    color: #444;
}

h3 {
    color: #999;
}

.btn {
    background: #f05462;
    color: white;
    padding: 5px 10px;
    text-align: center;
    position: relative;
    left: 140px;
    margin-left: 60px;
    
}

.btn:hover {
    color: #f05462;
    background: white;
    padding: 3px 8px;
    border: 2px solid #f05462;
}

.title {
    display: flex;
    align-items: center;
    justify-content: space-around;
    padding: 15px 10px;
    border-bottom: 2px solid #999;
}

table {
    padding: 10px;
}

th,
td {
    text-align: left;
    padding: 8px;
}

.side-menu {
    position: fixed;
    background: #f05462;
    width: 20vw;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    left:0;
    top:0;

}

.side-menu .brand-name {
    height: 10vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.side-menu li {
    font-size: 24px;
    padding: 8px 30px;
    color: white;
    display: flex;
    align-items: center;
}

.side-menu li:hover {
    background: white;
    color: #f05462;
    
    
}
.side-menu a{
    color: white;

}
.side-menu a:hover{
    background: white;
    color: #f05462;
    text-decoration: none;
    cursor: pointer;
    
}


.container {
    position: absolute;
    right: 0;
    width: 80vw;
    height: 100vh;
    background: #f1f1f1;
}

.container1 {
    position: absolute;
    right: 0;
    width: 80vw;
    height: auto;
    background: #f1f1f1;
}



.container .header {
    position: fixed;
    top: 0;
    right: 0;
    width: 80vw;
    height: 10vh;
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.container .header .nav {
    width: 90%;
    display: flex;
    padding-left: 500px;
    align-items: center;
    
}

.container .header .nav .search {
    flex: 3;
    display: flex;
    justify-content: center;
}

.container .header .nav .search input[type=text] {
    border: none;
    background: #f1f1f1;
    padding: 10px;
    width: 50%;
}

.container .header .nav .search button {
    width: 40px;
    height: 40px;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
}

.container .header .nav .search button img {
    width: 30px;
    height: 30px;
}

.container .header .nav .user {
    flex: 1;
    display: flex;
    /* justify-content: space-between; */
    align-items: center;
}

.container .header .nav .user img {
    width: 40px;
    height: 40px;
    
}

.container .header .nav .user .img-case {
    position: relative;
    width: 50px;
    height: 50px;
    
}

.container .header .nav .user .img-case img {
    position: absolute;
    top: 0;
    left: 200px;
    width: 100%;
    height: 100%;
}

.container .content {
    position: relative;
    margin-top: 10vh;
    min-height: 90vh;
    background: #f1f1f1;
}

.container .content .cards {
    padding: 20px 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}

.container .content .cards .card {
    width: 250px;
    height: 150px;
    background: white;
    margin: 20px 10px;
    display: flex;
    align-items: center;
    justify-content: space-around;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.container .content .content-2 {
    min-height: 60vh;
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
    flex-wrap: wrap;
}

.container .content .content-2 .recent-payments {
    min-height: 50vh;
    flex: 5;
    background: white;
    margin: 0 25px 25px 25px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    display: flex;
    flex-direction: column;
}

.container .content .content-2 .new-students {
    flex: 2;
    background: white;
    min-height: 50vh;
    margin: 0 25px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    display: flex;
    flex-direction: column;
}

.container .content .content-2 .new-students table td:nth-child(1) img {
    height: 40px;
    width: 40px;
}

@media screen and (max-width: 1050px) {
    .side-menu li {
        font-size: 18px;
    }
}

@media screen and (max-width: 940px) {
    .side-menu li span {
        display: none;
    }
    .side-menu {
        align-items: center;
    }
    .side-menu li img {
        width: 40px;
        height: 40px;
    }
    .side-menu li:hover {
        background: #f05462;
        padding: 8px 38px;
        border: 2px solid white;
    }
}

@media screen and (max-width:536px) {
    .brand-name h1 {
        font-size: 16px;
    }
    .container .content .cards {
        justify-content: center;
    }
    .side-menu li img {
        width: 30px;
        height: 30px;
    }
    .container .content .content-2 .recent-payments table th:nth-child(2),
    .container .content .content-2 .recent-payments table td:nth-child(2) {
        display: none;
    }
}

</style>


</body>
</html>