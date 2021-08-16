<?php 
session_start();
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Lifestyle service provider</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Bootstrap News Template - Free HTML Templates" name="keywords">
        <meta content="Bootstrap News Template - Free HTML Templates" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet"> 

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top Bar Start -->
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="tb-contact">
                            <p><i class="fas fa-envelope"></i>lifestyleservices@gmail.com</p>
                            <p><i class="fas fa-phone-alt"></i>+919916476256</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tb-menu">
                            <a href="">About</a>
                            <a href="">Privacy</a>
                            <a href="">Terms</a>
                            <a href="">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar Start -->
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container" >
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4">
                        <div class="b-logo">
                            <a href="index.php">
                                <img src="img/service_logo2.png" alt="Logo" style="width:550px", style="height:500px";>
                            </a>
                        </div>
                    </div>
                   
                    <div class="col-lg-3 col-md-4">
                        <div class="b-search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
</div>
        <!-- Brand End -->

        <!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.html" class="nav-item nav-link active">Home</a>
                           
                            <a href="register.php" class="nav-item nav-link">Register</a>
                            <a href="login.php" class="nav-item nav-link">Login</a>
                           
                        </div>
                        <div class="social ml-auto">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->

        <!-- Top News Start-->
        <div class="top-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 tn-left">
                        <div class="row tn-slider">
                       
                            <?php
        // var_dump($query1);
        $query = mysqli_query($con,'SELECT * FROM service_info order by views desc LIMIT 4');
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
             <div class="col-md-10">
                                <div class="tn-img">
                                    <img src="img/<?php echo $row['f_img'];?>" />
                                    <div class="tn-title">
                                        <a href="service_details.php?nid=<?php echo $row['f_id'];?>"><?php echo $row['f_service'];?></a>
                                    </div>
                                </div>
                            </div>
        <?php } ?>
          </div>
                    </div>                            
                        </div>
        </div>
        </div>
        <!-- Top News End-->

        <!-- Category News Start-->
        <div class="cat-news">
            <div class="container">
                <div class="row">
               
                    <div class="col-md-6">
                    <div class="fashiondesigners">
                        <h2>Fashion designers</h2>
                        <div class="row cn-slider">
                           <?php
                           $query2 = mysqli_query($con,'SELECT * FROM service_info WHERE category = 1 ORDER BY views desc LIMIT 3');
            
                           while( $fashion = mysqli_fetch_array($query2)) {
                               ?>
                                <div class="col-md-6">
                                    
                                <div class="cn-img">
                                
                                    <img src="img/<?php echo $fashion['f_img'];?>"  style="height:300px"/>
                                  
                                    <div class="cn-title">
                                        <a href="service_details.php?nid=<?php echo $fashion['f_id']; ?>"><?php echo $fashion['f_service']; ?></a>
                                    </div>
                                </div>
                            </div>
                           <?php }?>
                        </div>
                    </div>
                    </div>
                

                    <div class="col-md-6">
                    
                        <h2>Jewellery</h2>
                        <div class="row cn-slider">
                        <?php
                           $query3 = mysqli_query($con,'Select * From service_info WHERE category = 2 ORDER BY views desc LIMIT 3');
            
                           while( $fashion1 = mysqli_fetch_array($query3)) {
                               ?>
                                <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="img/<?php echo $fashion1['f_img']; ?>"  style="height:300px"/>
                                    <div class="cn-title">
                                        <a href="service_details.php?nid=<?php echo $fashion1['f_id']; ?>"><?php echo $fashion1['f_service']; ?></a>



                           
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Category News End-->

        <!-- Category News Start-->
        <div class="cat-news">
            <div class="container">
                <div class="row">
               
                    <div class="col-md-6">
                        <h2>Makeup artists</h2>
                        <div class="row cn-slider">
                        <?php
                           $query4 = mysqli_query($con,'Select * From service_info WHERE category = 3 ORDER BY views desc LIMIT 3');
            
                           while( $fashion2 = mysqli_fetch_array($query4)) {
                               ?>
                                <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="img/<?php echo $fashion2['f_img']; ?>"  style="height:300px" />
                                    <div class="cn-title">
                                        <a href="service_details.php?nid=<?php echo $fashion2['f_id']; ?>"><?php echo $fashion2['f_service']; ?></a>
                            
                        </div>
                       
                    </div>
                           </div>
                           <?php } ?>
                           </div>
                           </div>
                    <div class="col-md-6">
                        <h2>Hair stylists</h2>
                        <div class="row cn-slider">
                        <?php
                           $query5 = mysqli_query($con,'Select * From service_info WHERE category = 4 ORDER BY views desc LIMIT 3');
            
                           while( $fashion3 = mysqli_fetch_array($query5)) {
                               ?>
                                <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="img/<?php echo $fashion3['f_img']; ?>" style="height:300px" />
                                    <div class="cn-title">
                                        <a href="service_details.php?nid=<?php echo $fashion3['f_id']; ?>"><?php echo $fashion3['f_service']; ?></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
           </div>
        </div>
    </div>
    </div>

        <!-- Category News End-->
        
       
        <!-- Main News Start-->
        <div class="main-news">
            <div class="container">
                <div><h3>Related images</h3></div> <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/service-350x223-1.jpeg"  style="height:300px"/>
                                    <div class="mn-title">
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/service-350x223-2.jpeg"  style="height:300px"/>
                                    <div class="mn-title">
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/service-350x223-3.jpeg"  style="height:300px"/>
                                    <div class="mn-title">
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/service-350x223-4.jpeg"  style="height:300px"/>
                                    <div class="mn-title">
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/service-350x223-5.jpeg"   style="height:300px"/>
                                    <div class="mn-title">
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/service-350x223-6.jpeg"  style="height:300px"/>
                                    <div class="mn-title">
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/service-350x223-7.jpeg"  style="height:300px"/>
                                    <div class="mn-title">
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/service-350x223-10.jpeg"  style="height:300px"/>
                                    <div class="mn-title">
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/service-350x223-9.jpeg"  style="height:300px"/>
                                    <div class="mn-title">
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                  
                </div>
            </div>
        </div>
    
        <!-- Main News End-->

        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Get in Touch</h3>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>#89 Church Street, NY, USA</p>
                                <p><i class="fa fa-envelope"></i>lifestyleservices@gmail.com</p>
                                <p><i class="fa fa-phone"></i>+919916476256</p>
                                <div class="social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                   

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">What We DO</h3>
                            <ul>
                                <li><a href="service_details.php?nid=">Fashion designers</a></li>
                                <li><a href="service_details.php">Makeup artists</a></li>
                                <li><a href="service_details.php">Hairstylists</a></li>
                                <li><a href="service_details.php">Jewellery</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">About Us</h3>
                            <div class="newsletter">
                                <p>
                                    Lifestyle is an online intermediate service platform which provides information of the lifestyle accessories.
                                </p>
                                <form>
                                    <input class="form-control" type="email" placeholder="Your email here">
                                    <button class="btn">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Footer Menu Start -->
        <div class="footer-menu">
            <div class="container">
                <div class="f-menu">
                    <a href="">Terms of use</a>
                    <a href="">Privacy policy</a>
                    <a href="">Cookies</a>
                    <a href="">Accessibility help</a>
                    <a href="">Advertise with us</a>
                    <a href="">Contact us</a>
                </div>
            </div>
        </div>
        <!-- Footer Menu End -->

        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                   

                  
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->

        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
