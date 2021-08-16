<?php
session_start();
error_reporting(0);
include('connect.php');
$c_feed = "";
$adrr = "";
$msg = $err = "";
$headers = "";
$sql = mysqli_query($con, "select * from f_data WHERE id = '" . $id . "'");
$f_data = mysqli_fetch_array($sql);
if (isset($_POST['submit'])) {
    $c_name = $_POST['name'];
    $c_email = $_POST['email'];
    $c_message = $_POST['message'];
    $c_subject = $_POST['subject'];

    $to = "sushmithamv.dbp@gmail.com";
    $subject = '
        ' . $_POST['subject'] . ' From  ' . $_SERVER['HTTP_HOST'];

    $message = '
        Name:' . $_POST['name'] . '
        Email: ' . $_POST['email'] . '
        Message:' . $_POST['message'];

    $headers .= 'From: <' . $_POST['email'] . '>' . "\r\n";
    $headers .= 'Cc: <' . $_POST['email'] . '>' . "\r\n";
    $resu = mail($to, $subject, $message, $headers);
    if ($resu == 'true') {
        $msg = "Thanks! We have received your email. We will get back to you with in 24hrs.";
        mysqli_query($con, "INSERT INTO comments (name,email,subject,message) VALUES('" . $c_name . "','" . $c_email . "','" . $c_subject . "','" . $c_message . "')");
    } else {
        $err = "Error Email! try again";
    }
}
if (isset($_POST['send'])) {
    $c_name = $_POST['name'];
    $c_feed = $_POST['feed'];
    $s_id = $_POST['id'];
    $sql2 = mysqli_query($con,"INSERT INTO feedback (f_id,c_name,c_feed) VALUES('".$s_id."','".$c_name."','".$c_feed."')");
    if ($sql2) {
      $msg= "Thanks for your feedback";
    } else {
       $err= "Oops something went wrong!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lifestyle servive provider</title>
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
                        <p><i class="fas fa-phone-alt"></i>+9916476256</p>
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
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4">
                    <div class="b-logo">
                        <a href="index.php">
                            <img src="img/service_logo2.png" alt="Logo" style="width:550px" ,style="height:500px">
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
                        <a href="index.php" class="nav-item nav-link active">Home</a>

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
    <!-- Nav Bar End -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">News</a></li>
                <li class="breadcrumb-item active"> Details</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!---Success Message--->
    <?php if ($msg) { ?>
        <div class="alert alert-success" role="alert">
            <strong>Well done!</strong> <?php echo "" . $msg; ?>
        </div>
    <?php } ?>
    <!---error Message--->
    <?php if ($err) { ?>
        <div class="alert alert-danger" role="alert">
            <strong></strong> <?php echo "" . $err; ?>
        </div>
    <?php } ?>

    <!-- fetching data from database -->
    <?php
    $id = $_GET['nid'];
    $query = mysqli_query($con, 'select * from service_info WHERE f_id = "' . $id . '"');
    $row = mysqli_fetch_array($query);
    $views = $row['views'] + 1;
    $update = mysqli_query($con, 'UPDATE service_info SET views = "' . $views . '" WHERE f_id = "' . $id . '" ');
    ?>
    <!-- Single News Start-->
    <div class="single-news">
        <div class="container">
            <div class="col-lg-12">
                <div class="sn-container">
                    <div class="sn-img">
                        <img src="img/<?php echo $row['f_img']; ?>" />
                    </div>
                    <i class="fas fa-eye"><?php echo $row['views']; ?></i>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">feedback</button>


                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST">
                                    <div class="form-group">
                                            <label for="name" class="col-form-label">SERVICE ID</label>
                                            <input type="text" class="form-control" id="name" name="id" value="<?php echo $id ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-form-label">Enter your name</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="feedback" class="col-form-label">Feedback</label>
                                            <textarea class="form-control" id="feedback" name="feed"></textarea>
                                        </div>
                                        <input type="submit" name="send">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sn-content">
                        <h1 class="sn-title"><?php echo $row['f_service']; ?></h1>
                        <p>
                            <?php echo $row['f_discription']; ?>
                        </p>

                    </div>
                </div>
            </div>
            <?php
            $query1 = mysqli_query($con, 'SELECT * FROM service_info WHERE category = "' . $row['category'] . '" AND NOT(f_id = "' . $id . '")');

            ?>
            <div class="sn-related">
                <h2>Other providers</h2>
                <div class="row sn-slider">
                    <?php while ($row1 = mysqli_fetch_array($query1)) { ?>
                        <div class="col-md-4">
                            <div class="sn-img">
                                <img src="img/<?php echo $row1['f_img']; ?>"  style="height:300px"/>
                                <div class="sn-title">
                                    <a href="service_details.php?nid=<?php echo $row1['f_id']; ?>"> <?php echo $row1['f_service']; ?></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Contact Start -->


        <div class="contact">
            <div class="container">
                <div>
                    <h2>Contact us</h2>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="contact-form">
                            <form action="" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="Your Name" name="name" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="email" class="form-control" placeholder="Your Email" name="email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject" name="subject" />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" placeholder="Message" name="message"></textarea>
                                </div>
                                <div><button class="btn" type="submit" name="submit">Send Message</button></div>
                            </form>
                            <?php

                            ?>
                        </div>
                    </div>
                    <?php
                    $sql1 = mysqli_query($con, 'SELECt * FROM f_data WHERE f_id = "' .$_GET['nid']. '"');
                    $data = mysqli_fetch_array($sql1);

                    ?>
                    <div class="col-md-4">
                        <div class="contact-info">
                            <h3>Get in Touch</h3>
                            <p>

                            </p>
                            <h4><i class="fa fa-map-marker"></i><?php echo $data['f_address']; ?></h4>
                            <h4><i class="fa fa-envelope"></i><?php echo $data['email_id']; ?></h4>
                            <h4><i class="fa fa-phone"></i><?php echo $data['f_number']; ?></h4>
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
            </div>
        </div>
      
        <!-- Contact End -->

         <!-- feedback display -->
         <div class='feedback'>
             <div class='container'>
                <div class='row'>
                  <div class='col-md-4'>
                    <div><h2>Feedback</h2>  <hr>
    
                 </div>
             </div>
             </div>
        
             </div>
        </div>
        <?php
        $sql2=mysqli_query($con,"SELECT * FROM feedback ORDER BY created_at desc");
        while($feed=mysqli_fetch_array($sql2)) {
        ?>
        <div class="container">
        
        <div class="row">
         <h4></h4>
        </div>
        <div class="media mb-4">
            <div class="media-body">
            <div class="row">
            <i class="fa fa-user-circle"></i> 
              <h5 class="mt-0"> <?php echo $feed['c_name'];?><br />
              </div>
             <div class="card" style="border: none;"> <?php echo $feed['c_feed'];?></div>
              </div>
             
                <span style="font-size:11px;"><b>Posted at</b><br><?php echo $feed['created_at'];?> </span>
              </h5>
              <?php echo htmlentities($row['comment']); ?>
            </div>
          </div>
          
        <?php } ?>




        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script src="https://kit.fontawesome.com/a8043b1d65.js" crossorigin="anonymous"></script>
</body>

</html>