<?php
session_start();
include('connect.php');
$passworderr = "";
$successmessage = "";
if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $con_password = $_POST['con_password'];
    if($password == $con_password){
        $final_password = $con_password;
        $sql = "INSERT INTO f_data (f_name,email_id,f_number,f_address,f_password) VALUES ('".$name."','".$email."','".$mobile."','".$address."','".$final_password."')";
       if($con->query($sql)){
        $successmessage = "Successfully inserted";
       }   else{
           echo"Error:".$sql.$con->error;
       } 
} else{
   $passworderr = "Password does not match";
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css" type="text/css">
    <title>Register</title>
  </head>
  <body>
  <?php include('header.php');?>
      <div class="container">
     <div class="header"> <h1>Register</h1></div>
    <div class="card">
    <form action="#" method="post">
    <label for="name">Enter your name</label>
    <input type="text" name="name" id="name" required>
    <label for="email">Email Id</label>
    <input type="email" name="email" id="email" required>
    <label for="mobile">Mobile number</label>
    <input type="text" name="mobile" id="mobile" required>
    <label for="address">Address </label>
    <input type="text" name="address" id="address" required>
    <label for="password">Choose your password </label>
    <input type="password" name="password" id="password" required>
    <label for="con_password">Confirm password</label>
    <input type="password" name="con_password" id="password" required>
    <small id="password" class="alert alert-danger "><?php echo $passworderr;?></small>
    <small id="password" class="alert alert-success "><?php echo $successmessage;?></small>
    <input type="submit" name="register">
    </form>
    <p class="col-sm-4">Already Registered? <a href="login.php" style="text-decoration: none;"> Login</a></p>
    </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>