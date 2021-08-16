<?php

session_start();
include("connect.php");
$msg=$err="";
if (isset($_POST['login'])) {
    $sql = "SELECT * From f_data WHERE f_number = '".$_POST['mobile']."' AND f_password = '".$_POST['password']."' ";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_array();
        $f_password = $row['f_password'];
        $mobile = $row['f_number'];
        if($mobile == $_POST['mobile']){
            if($f_password == $_POST['password']){
                $_SESSION['f_id'] = $row['f_id'];
                $_SESSION['login'] = "TRUE";
               $msg =  "Login successfull";
                echo '<meta http-equiv="refresh" content="3;URL= franchise_pannel.php">';
            } else{
               $err= "Password is incorrect";
            }
        } else{
            echo "user does not exist";
        }
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
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <?php include('header.php');?>
    <div class="container">
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
        <div class="header">
            <h1>Login</h1>
        </div>
        <div class="card">
            <form action="" method="post">
                <label for="mobile number">Mobile number</label>
                <input type="text" name="mobile" id="mobile number">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <input type="submit" name="login">
            </form>
            <p>New user <a href="register.php" style="text-decoration: none;">
                    Register
                </a></p>
        </div>
    </div>
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