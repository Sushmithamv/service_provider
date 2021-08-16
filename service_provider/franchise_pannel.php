<?php
session_start();
include('connect.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {  ?>
  <!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- externel css -->
    <link rel="stylesheet" href="style.css" type="text/css">
    <!-- summernote.css -->
    <link rel="stylesheet" href="summernote.css" type="text/css">
    <title>Dashboard | Franchise</title>
    <script src="https://kit.fontawesome.com/93af42d909.js" crossorigin="anonymous"></script>
    <style>
      textarea {
        width: 600px;
        height: 120px;
        border: 3px solid #cccccc;
        padding: 5px;
        font-family: Tahoma, sans-serif;
        background-image: url(bg.gif);
        background-position: bottom right;
        background-repeat: no-repeat;
      }
    </style>
  </head>

  <body>
    <?php include("header.php") ?>
    <div class="container">
      <div class="row">
      <div class="col-md-6">
          <div class="card-img-top">
            <div class="card" style="width:500px" ,style="height:800px">
              <div class="card-body"></div>
              <img class="card-img-top" src="img/service_logo2.png" alt="image" style="width:100%">

              <a href="add_new.php" class="btn btn-primary">Add Your Business</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card-img-top">
            <div class="card" style="width:500px" ,style="height:800px">
              <div class="card-body"></div>
              <img class="card-img-top" src="img/service_logo2.png" alt="image" style="width:100%">

              <a href="edit-business.php" class="btn btn-primary">Edit Your Business</a>
            </div>
          </div>
        </div>
      </div>
    </div>

        <script>
          jQuery(document).ready(function() {

            $('.summernote').summernote({
              height: 240, // set editor height
              minHeight: null, // set minimum height of editor
              maxHeight: null, // set maximum height of editor
              focus: false // set focus to editable area after initializing summernote
            });
            // Select2
            $(".select2").select2();

            $(".select2-limiting").select2({
              maximumSelectionLength: 2
            });
          });
        </script>
        <!--Summernote js-->
        <script src="summernote.min.js"></script>
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
<?php } ?>