<style>
    
    .navbar {
        padding: 10px 8% 0px 8%;
        background-color: #fff;
    }
    .nav-item, .dropdown-item {
        list-style: none;
        font-weight: 400;
        font-size: 14px;
        color: #404040;
    }
    .dropdown-item:hover {
        color: #b9732f;
    }
    .dropdown-item:active {
        background-color: #b9732f;
        color: #fff;
    }
    .nav-link:active {
        color: #b9732f !important;
        font-weight: 600;
    }
    .signin-btn button, .logout-btn button{
        padding: 4px 20px;
        background-color: #b9732f;
        color: #fff;
        border-radius: 3px;
        font-weight: 400;
        font-size: 14px;
        border-style: none;
    }
    .signin-btn button:hover {
        background-color: #da8334;
    }
    .logout-btn button:hover {
        background-color: #707070;
    }
    #pictureDisplay{
        border-radius: 50%;
        width: 30px;
        height: 30px;
        margin: auto;
        object-fit: cover;
        background-position: center;
    }
    .h-img:hover {
        transform: scale(1.25);
    }

</style>
<nav class="navbar sticky-top navbar-light navbar-expand-lg bg-#fff">

    <a class="navbar-brand d-block order-0 order-md-0 w-25" href="landing.php"><img src="https://drive.google.com/uc?export=view&id=1xlR9M1FzmUxVYpGCvxkkyaSIMl0S3Xxc"  alt="" width="180px" height="60px"></a>

    <div class="navbar-collapse collapse dual-nav order-1 w-50 order-md-1">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item px-4"><a class="nav-link" href="configs/index.php">Home</a></li>

            <?php if(!isset($_SESSION['role']) && empty($_SESSION['role'])) {?>
            <li class="nav-item px-4"><a class="nav-link" href="configs/index.php">Account</a></li>
            <?php } else if(isset($_SESSION['role']) && !empty($_SESSION['role'])) { ?>
            
                <li class="nav-item dropdown px-4">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
                    <div class="dropdown-menu">
                    <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == "user")) { ?> 
                    <a class="dropdown-item" href="account_settings.php">Account Settings</a>
                    <a class="dropdown-item" href="user_apply.php">Apply as a Handyman</a>
                    <?php } else if(isset($_SESSION['role']) && ($_SESSION['role'] == "handyman")) { ?>
                    <a class="dropdown-item" href="account_settings.php">Account Settings</a>
                    <?php } else if(!isset($_SESSION['role'])) { ?>
                    <a class="dropdown-item" href="account_settings.php">s Settings</a>
                    <?php }?>
                    </div>
                </li>
            <?php } ?>


            <?php if(!isset($_SESSION['role']) && empty($_SESSION['role'])) {?>
            <li class="nav-item px-4"><a class="nav-link" href="configs/index.php">Bookings</a></li>
            <?php } else if(isset($_SESSION['role']) && !empty($_SESSION['role'])) { ?>
                <li class="nav-item dropdown px-4">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Bookings</a>
                    <div class="dropdown-menu">
                    <?php   if(isset($_SESSION['role']) && ($_SESSION['role'] == "user")) { ?> 
                        <a class="dropdown-item" href="book_service.php">Book a Service</a>
                        <a class="dropdown-item" href="history.php">Bookings/History</a>
                    <?php } else if(isset($_SESSION['role']) && ($_SESSION['role'] == "handyman")) { ?>
                        <a class="dropdown-item" href="book_service.php">Book a Service</a>
                        <a class="dropdown-item" href="handyman_dashboard.php#bookings">My Job/s</a>
                        <a class="dropdown-item" href="history.php">Bookings/History</a>
                    <?php } ?>
                    </div>
                </li>
            <?php } ?>
            <li class="nav-item dropdown px-4">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="landing.php#features">Features</a>
                <a class="dropdown-item" href="landing.php#services">Services</a>
                <a class="dropdown-item" href="landing.php#apply">Be one of us</a>
                <a class="dropdown-item" href="contact_us.php">Contact Us</a>
                <a class="dropdown-item" href="faqs.php">FAQs</a>    
                </div>
            </li>

        </ul>
    </div>

    <div class="navbar-collapse collapse dual-nav w-25 order-2 order-md-2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
            <?php
        
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                    if (isset($_SESSION['role']) && ($_SESSION['role'] != "admin")) { ?>
                        <a href="account_settings.php" class="d-none d-lg-block"><img src="<?php echo 'resources/profileImage/' .$_SESSION['image']?>" onerror="this.src='https://image.flaticon.com/icons/png/128/2983/2983067.png';" id="pictureDisplay" class="h-img"></a>
                <?php } else { ?>
                        <a href="account_settings.php" class="d-none d-lg-block"><img src="<?php echo 'resources/profileImage/' .$_SESSION['image']?>" onerror="this.src='https://image.flaticon.com/icons/png/128/2983/2983067.png';" id="pictureDisplay" class="h-img"></a>
                <?php } ?>
            </li>
            <li class="nav-item active">
                    <a class="logout-btn nav-item px-4" href="configs/logout.php"><button class="button">Logout</button></a>
            <?php } else {?>
                    <a class="signin-btn nav-item px-4" href="signin.php"><button class="button">Sign in</button></a>
            <?php } ?> 
            </li>
        </ul>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>

    </button>
</nav>

