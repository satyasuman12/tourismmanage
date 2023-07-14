<div class="container">
        <div class="header">
            
                
            
            <div class="nav">
            
                <div class="user">
                    
                    
                    <a href="../Home.php" class="btn">Preview Website</a>
                    <a href="logout.php" class="btn">Logout</a>
                    
                    <div class="img-case">
                        <img src="images/user.png" alt="">
                    </div>
                </div>
            </div>
        </div>
	</div>


<style>
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

.container {
    position: absolute;
    right: 0px;
    width: 80vw;
    height: 100vh;
    background: #f1f1f1;
    display: flex;
    flex-wrap: wrap;
}


.container .header {
    position: fixed;
    top: 0;
    right: 0;
    width: 80vw;
    height: 10vh;
    background: white;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.container .header .nav {
    width: 80vw;
    display: flex;
    padding-left: 500px;
    align-items: center;
    
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
</style>