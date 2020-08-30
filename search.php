<?php 
include "dbcon.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>XBlog</title>
    <link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- https://fonts.google.com/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-xtra-blog.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">

</head>

<body>

    <div class="container my-3">
        <hr class="tm-hr-dark tm-mb-55">


        <?php
        $search=$_GET['query'];
        $sql="SELECT * FROM politic WHERE MATCH(pol_title,pol_cat) against('.$search.')";
        $result=mysqli_query($con,$sql);
        $num_row=mysqli_num_rows($result);
        
  echo ' <h2 class="py-3">Search Result For <em>"'.$search.'"</em></h2>';
 echo ' <div class="row tm-row">';
  if($num_row != 0){
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
                            }
                            else{
                                echo '<h4> Oops! No result found for this search.</h4>';
                            }
                             echo '</div>';
                             include "footer.php";
?>



    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>