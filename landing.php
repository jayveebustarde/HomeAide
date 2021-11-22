<?php
    session_start();

    include 'configs/connect.php';
   
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="shortcut icon" type="img/png" href="https://drive.google.com/uc?export=view&id=11faVxeXoK02-bDkLHPG1a4tA1SjCwh_n">
    <title>Home Aide</title>

</head>
<style>
    * {
      padding: 0;
      margin: 0;
      font-family: 'Montserrat', sans-serif;
    }
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
    .signin-btn button{
        padding: 4px 20px;
        background-color: #b9732f;
        color: #fff;
        border-radius: 3px;
        font-weight: 400;
        font-size: 14px;
        border-style: none;
    }
    .logout-btn button{
        padding: 4px 20px;
        background-color: #b9732f;
        color: #fff;
        border-radius: 3px;
        font-weight: 400;
        font-size: 14px;
        border-style: none;
    }
    .container h2{
        font-weight: 600;
        font-size: 36px;
    }
    .container h1{
        font-weight: 700;
        font-size: 48px;
        color: #b9732f;
    }
    .main-text p {
        color: #606060;
        padding: 10px 0px;
    }
    .getstarted-btn button{
        padding: 6px 24px;
        background-color: #b9732f;
        color: #fff;
        border-radius: 3px;
        font-weight: 400;
        font-size: 14px;
        border-style: none;
    }
    .getstarted-btn button:hover{
    
        background-color: #da8334;
    }
    .video-btn  {
        color: #fff;
        background-color: #606060;
        font-weight: 400;
        font-size: 14px;
        border-style: none;
    }
    .video-btn:hover {
        color: #fff;
        background-color: #404040;
        font-weight: 400;
        font-size: 14px;
        border-style: none;
    }
    .container {
        padding-top: 2%;

    }
    .modal-dialog {
        max-width: 800px;
        margin: 30px auto;
    }
    .modal-body {
        position:relative;
        padding:0px;
    }
    .close {
        position:absolute;
        right:-30px;
        top:0;
        z-index:999;
        font-size:2rem;
        font-weight: normal;
        color:#fff;
        opacity:1;
    }
    .top-text h3 {
        font-size: 18px;
        font-weight: 500;
        color: #303030;
    }
    .container h5 {
        font-weight: 600;
        font-size: 16px;
        color: #404040;
    }
    .container p {
        font-weight: 400;
        font-size: 16px;
        color: #606060;
    }
    .features p {
        font-weight: 400;
        font-size: 14px;
        color: #606060;
    }
    .carousel-inner img {
        margin: auto;
    }
    .carousel-control-prev-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
    }
    .carousel-control-next-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;
    }
    .carousel-indicators li { 
        visibility: hidden;
    }
    .rec-textarea p {
        color: #606060;
        padding: 10px 0px;
    }
    .ico {
        font-size: 20px;
        color: #b9732f;
    }
    .ico-title {
        font-size: 16px;
        color: #b9732f;
    }
    .footer {
        left: 0;
        bottom: 0;
        height: 40px;
        width: 100%;
        background-color: #606060;
        color: white;
        font-size: 14px;
        text-align: center;
    }
    .c-card:hover {
        border-width: thin;
        border: 1px solid #b9732f;
    }

    .zoom:hover {
    transform: scale(1.25);
    }

    @media (-webkit-device-pixel-ratio: 1.25) {
        :root {
            zoom:0.8;
        }
    }
    button[type=button]:focus {
        box-shadow: none;
    }
    
</style>
<body>
<!-- navigation bar -->
<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/home_aide/assets/"; include($IPATH. "header.php"); ?>
<!-- navigation bar -->


    <!-- landing page -->
   

        <!-- container 1 -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="img-container">     
                        <img src="https://drive.google.com/uc?export=view&id=1SpOvUGdpwA_5IJ8TTGFDry-SgKH10UvK" class="zoom img-fluid d-none d-md-block" alt="">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="main-text pt-5">
                        <h2>For your</h2>
                        <h1>Home Repair</h1>
                        <h2>concerns</h2>
                        <p class="pt-4">Everyone desires a stress-free, handy, and comfortable lifestyle. Home Aide is a booking system that connects people who are looking for handymen to accomplish work in their homes with businesses or experts who are looking to provide those services to customers.  Also, this is to provide with a platform where transactions would be completed more quickly.</p>
                        <div class="row">
                            <div class="col-lg-6 py-2">
                            <?php
                                if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin'] == true){?>
                                    <a class="getstarted-btn" href="configs/index.php"><button class="button w-100">Book Now</button></a>
                            <?php }else{?>
                                <a class="getstarted-btn" href="signup.php"><button class="button w-100">Get Started</button></a>
                            <?php } ?>
                            </div>

                            <div class="col-lg-6 py-2">
                            <a class="video-btn">
                            <button type="button" class="btn video-btn w-100" data-toggle="modal" data-target="#myModal"> <i class="fa fa-video-camera"></i>&nbsp;Watch Video</button></a>

                                <!-- modal for walkthrough video -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                            </div>
                                            <div class="modal-body">   
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe width="930" height="523" src="https://www.youtube.com/embed/7AL91Vb_WmA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" id="features">
        
        </div>
        <!-- container 2 -->
        <div class="container">
            <div class="features ">
                <div class="row mx-2 py-4">
                    <div class="col-12 py-4">
                        <div class="top-text">
                            <h3 class="text-center font-weight-bold">Awesome Features</h>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 mb-4">
                        <div class="c-card border text-center position-relative px-4 py-4 rounded-lg shadow"> <img src="https://drive.google.com/uc?export=view&id=10UWrAOk8QWaXjiIScMC3YaSbUPk17cgx" class="img-fluid d-none d-lg-block" alt="feature-image">
                            <h5 class="pt-4 pb-2 text-capitalize card-title">Easy Job Scheduling</h5>
                            <p class="mb-4">Users are able to book services through the integration of the appointment system.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 mb-4">
                        <div class="c-card border text-center position-relative px-4 py-4 rounded-lg shadow"> <img src="https://drive.google.com/uc?export=view&id=1tPagCPvKoEFQD9qbd-tKple2fQvhCDdU" class="img-fluid d-none d-lg-block" alt="feature-image">
                            <h5 class="pt-4 pb-2 text-capitalize card-title">Locate Nearby Handyman</h5>
                            <p class="mb-4">Users are able to view all the handyman that offer services within the area provided by the user.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 mb-4">
                        <div class="c-card border text-center position-relative px-4 py-4 rounded-lg shadow"> <img src="https://drive.google.com/uc?export=view&id=11ZfwCedGU-SuYMb45dU8pZep628TDW8I" class="img-fluid d-none d-lg-block" alt="feature-image">
                            <h5 class="pt-4 pb-2 text-capitalize card-title">Fair Rating System</h5>
                            <p class="mb-4">Rating system will only be available to those whom the workers had successful transaction(s) with.</p>
                        </div>
                    </div>
     
                </div>
            </div>        
        </div>

        <div class="container" id="services">
        
        </div>
        <!-- container 3 -->
        <div class="container">
            <div class="row mx-2">
                <div class="col-lg-6 py-5" >
                    <div class="our-services">
                        <h4 class="pt-4 text-right">Our</h4>
                        <h2 class="py-2 text-right">Services</h2>
                        <p class="text-right">Home Aide provides benefits to various sectors that are centered on home services, such as gardening, pest control, carpentry, masonry, laundry, cleaning, paint/decor, welding, plumbing, electrical, technical, and other home services.</p>
                    </div>
                </div>
                <div class="col-lg-6 py-5">
                    <div class="container">

                        <!-- carousel -->
                        <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                                <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img class="d-block w-75" src="https://drive.google.com/uc?export=view&id=1PckKctfjQfZ2A8LV4nPTC6lFK6qoetS4" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-75" src="https://drive.google.com/uc?export=view&id=1qix8E2A3MOFU0Tn72GDsknK-JV4gU_Vy" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-75" src="https://drive.google.com/uc?export=view&id=14XxDNDQPh3u34IH4EBXui-O1mLoVistz" alt="Third slide">
                                </div>

                                <!-- carousel controls -->
                                <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container" id="apply"></div>
        <!-- container 4 -->
        <div class="container">
            <div class="row mx-2">
                <div class="col-lg-6 py-3">
                    <div class="img-container">
                        <img src="https://drive.google.com/uc?export=view&id=1S6ExJ7vc6k_Fad1K8y33JWf_bbVpNrXy" class="zoom img-fluid d-none d-md-block" alt="">
                    </div>
                </div>
                <div class="col-lg-6 py-3">
                    <div class="rec-textarea pt-4">
                        <h2>Be one of our</h2>
                        <h1>Handyman</h1>
                        <h2>Now!</h2> <br>
                        <h5>Here are some of the benefits a Handyman can get in our platform:</h5> 
                            <p>Connect with new costumers. <br>
                            Enhance the brand's image.<br>
                            Generate revenues while incurring less expenses.<br>
                            Draw customers without a brand.</p> 
                        <a class="getstarted-btn" href="configs/index.php"><button class="w-100 py-2">Get Started</button></a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- container 5 -->
        <div class="container  my-4" id="how">
            <div class="row py-4">
                <div class="col-lg-12 text-center">
                    <div class="title p">
                        <h5 class="font-weight-bold">How it Works</h5>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-2  text-center py-2">
                    <i class="fa fa-search ico pb-2"></i>
                    <h6 class="ico-title">Search</h6>
                    <span> <small class="text-muted d-none d-md-block">Search based on your preference.</small></span>
                </div>
                <div class="col-2 text-center py-2">
                    <i class="fa fa-mouse-pointer ico pb-2"></i>
					<h6 class="ico-title">Choose</h6>
					<span> <small class="text-muted d-none d-md-block">Choose from the variety of services being offered.</small></span>
                </div>
                <div class="col-2 text-center py-2">
                    <i class="fa fa-book ico pb-2"></i>
					<h6 class="ico-title">Book</h6>
					<span> <small class="text-muted d-none d-md-block">Book the service of your chosen Handyman.</small></span>
                </div>
                <div class="col-2 text-center py-2">
                    <i class="fa fa-check-square ico pb-2"></i>
					<h6 class="ico-title">Done</h6>
					<span> <small class="text-muted d-none d-md-block">Booking Complete!</small></span>
                </div>
            </div>
        </div>
   

    
    <?php include($IPATH . "footer.php"); ?>


</body>
<script>
        $(document).ready(function() {
        var $videoSrc;  
        $('.video-btn').click(function() {
            $videoSrc = $(this).data( "src" );
        });
        console.log($videoSrc);

        $('#myModal').on('shown.bs.modal', function (e) {
            
        $("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" ); 
        })
        
        $('#myModal').on('hide.bs.modal', function (e) {

            $("#video").attr('src',$videoSrc); 
        }) 
            
        });

        $("#myModal").on('hidden.bs.modal', function (e) {
            $("#myModal iframe").attr("src", $("#myModal iframe").attr("src"));
        });
</script>
</html>