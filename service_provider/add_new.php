<?php
session_start();
include('connect.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else { ?>
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
    <title>Franchise Login</title>
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
  <?php include('header.php');?>
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="p-6">
            <div class="">
              <form name="addpost" method="post" enctype="multipart/form-data">
                <!-- input business name -->
                <div class="row">
                  <div class="col">
                    <label for="f_name"> Enter your business name</label>
                    <input type="text" name="f_name" id="f_name">
                  </div>
                </div>
                <!-- input business discription -->
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box">
                      <h5 class="m-b-30 m-t-0 header-title"><b>Business Details</b></h5>
                      <textarea class="summernote" name="postdescription" required></textarea>
                    </div>
                  </div>
                </div>
                <!-- select a category -->
                <div class="form-group m-b-20">
                  <label for="category">Category</label>
                  <select class="form-control" name="category" id="category" required>
                    <option value="">Select Category </option>
                    <?php
                    // Feching active categories
                    $ret = mysqli_query($con, "select * from category");
                    while ($result = mysqli_fetch_array($ret)) {
                    ?>
                      <option value="<?php echo htmlentities($result['id']); ?>"><?php echo htmlentities($result['category']); ?></option>
                    <?php } ?>

                  </select>
                </div>

                <!-- select an image -->
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box">
                      <h4 class="m-b-30 m-t-0 header-title"><b>Select an Image</b></h4>
                      <input type="file" class="form-control" id="postimage" name="postimage" required>
                    </div>
                  </div>
                </div>

                <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Save and Post</button>
                <button type="reset" class="btn btn-success waves-effect waves-light"> Reset</button>
                 <!-- // For adding post   -->
                  <?php
                  if(isset($_POST['submit']))
                  {
                    $user_id=$_SESSION['f_id'];
                    $user_name=$_POST['f_name'];
                    $catid=$_POST['category'];
                    $postdetails=$_POST['postdescription'];
                    $imgfile=$_FILES["postimage"]["name"];
                      // get the image extension
                    $extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
                       // allowed extensions
                       $allowed_extensions = array(".jpg","jpeg",".png",".gif");
                         // Validation for allowed extensions .in_array() function searches an array for a specific value.
                         if(!in_array($extension,$allowed_extensions))
                          {
                              echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
                          }
                         else
                        {}
                              //rename the image file
                          $imgnewfile=md5($imgfile).$extension;

                              $query=mysqli_query($con,'INSERT INTO service_info(f_id,f_img,f_discription,f_service,category) VALUES 
                              ("'.$user_id.'","'.$imgnewfile.'","'.$postdetails.'","'.$user_name.'","'.$catid.'")');
                              if($query)
                              {
                                echo "Post successfully added ";
                                 // Code for move image into directory
                             move_uploaded_file($_FILES["postimage"]["tmp_name"],"img/".$imgnewfile);

                              $query2=mysqli_query($con, 'UPDATE TABLE f_data SET facebook=');
                            
                              }
                              else{
                                    echo "Something went wrong . Please try again.".mysqli_error($query); 
                                       
                                  } 

                            }                         
                          }
?>
<?php}?>
              </form>
            </div>
          </div>
        </div>

      </div>
            </div>

            <script>

jQuery(document).ready(function(){

    $('.summernote').summernote({
        height: 240,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false                 // set focus to editable area after initializing summernote
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

<?php}?>