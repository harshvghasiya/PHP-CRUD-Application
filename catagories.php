<?php
                    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XBlog</title>
    <link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- https://fonts.google.com/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-xtra-blog.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
</head>

<body>

    <?php 
    include "dbcon.php";
    ?>




    <div class="container my-4">
        <div class="row tm-row">
            <?php
  $cat=$_GET['catagory'];

  $sql="SELECT * FROM `politic` WHERE pol_cat ='$cat'";
  $result=mysqli_query($con,$sql);

   while ($row=mysqli_fetch_assoc($result)) {

    $pol_title=$row['pol_title'];
    $pol_desc=$row['pol_dec'];
    $pol_id=$row['pol_id'];
    $pol_date=$row['pol_date'];
    $pol_img=$row['pol_img'];
    $pol_cat=$row['pol_cat'];
    
                  echo '
                  <article class="col-12 col-md-6 tm-post">
                  <hr class="tm-hr-primary ">
                  <a href="post.php?get='.$pol_id.'&cat='.$pol_cat.'" class="effect-lily tm-post-link tm-pt-60" >
                  <div class="tm-post-link-inner">
                      <img src="politicsimg/'.$pol_img.'" alt="Image" class="img-fluid">
                  </div>
                  <span class="position-absolute tm-new-badge">'.$pol_cat.'</span>
                  <h2 class="tm-pt-30 tm-color tm-post-title" >'.$pol_title.'</h2>
              </a>
              <p class="tm-pt-30">
                  '.substr($pol_desc,0,290).'....
              </p>
              <div class="d-flex justify-content-between tm-pt-45">
                  <span class="tm-color-black">.'.$pol_cat.'</span>
                  <span class="tm-color-dark">'.$pol_date.'</span>
              </div>
              <hr>
              <div class="d-flex justify-content-between">
                  <span></span>
                  <span>by Harsh</span>
              </div>
              </article>';
              
              }  
                  ?>





        </div>
        <?php
           include "footer.php";
           ?>


    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>

</html>