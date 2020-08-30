<?php include "dbcon.php";
    session_start();
    include "loginmodal.php";
    include "singupmodal.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xtra Blog</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- https://fonts.google.com/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-xtra-blog.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link href="assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <!--
    
TemplateMo 553 Xtra Blog

https://templatemo.com/tm-553-xtra-blog

-->





</head>

<body>
    <?php
   
    include "header.php";
    ?>

    <div class="container-fluid">
        <main class="tm-main">
            <!-- Search form -->


            <div class="row tm-row">
                <div class="col-lg-8 tm-post-col">

                    <?php
            $ids=$_GET['get'];
      $sql="SELECT * FROM `politic` WHERE pol_id=$ids";
      $result=mysqli_query($con,$sql);
      while ($row=mysqli_fetch_assoc($result)) {
         $pdet_title=$row['pol_title'];
         $pdet_dec=$row['pol_dec'];
         $pdet_date=$row['pol_date'];
         $pdet_id=$row['pol_id'];
         $pdet_img=$row['pol_img'];
         $pdet_cat=$row['pol_cat'];
         $pol_soc=$row['pol_soc'];
       echo '
       
       <div class="row tm-row">
       <div class="col-12">
           <hr class="tm-hr-primary tm-mb-55">
           <!-- Video player 1422x800 -->
           <img src="politicsimg/'.$pdet_img.'" class="d-block w-100" alt="...">

       </div>
   </div>
       
       <div class="tm-post-full">
       <div class="mb-4">
           <h2 class="pt-2 tm-color-dark tm-post-title">'.$pdet_title.'</h2>
           <p class="tm-mb-40">'.$pdet_date.'posted by Harsh</p>
          
           <p>
              '.$pdet_dec.'
           </p>
        <span class="d-block text-right tm-color-primary"><a  class="tm-colr-primary" href="'.$pol_soc.'" > Source </a></span>
        
       </div>';
      }
    ?>


                    <!-- Comments -->


                    <div>
                        <h2 class="tm-color-dark tm-post-title">Comments</h2>
                        <hr class="tm-hr-primary tm-mb-45">
                        <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="POST" class="mb-5 tm-comment-form">
                            <h2 class="tm-color-dark tm-post-title mb-4">Your comment</h2>
                            <?php 
                              if((isset($_SESSION['loggedin'])) && ($_SESSION['loggedin']==true)){
                                  echo ' <div class="mb-4">
                                  <textarea class="form-control" name="message" rows="6" required></textarea>
                              </div>
                              <div class="text-right">
                                  <button class="tm-btn tm-btn-primary tm-btn-small" name="submit">Submit</button>
                              </div>';
                              }else {
                                  echo '<p style="fontsize:25px;color:DeepSkyBlue;">Please Login To comment</p>';
                              }
                            
                            ?>

                        </form>

                        <?php
                    $method=$_SERVER['REQUEST_METHOD'];
                   
                    $coment=$_POST['message'];
                    if (isset($_POST['submit']) && $coment!='') {
                        $id=$_GET['get'];
                        $coment=$_POST['message'];
                        $coment_by=$_SESSION['username'];
    
                        $query="INSERT INTO `comment` (`come_id`, `come_dec`, `come_by`,`postp_id` ,`come_date`) VALUES (NULL, '$coment', '$coment_by','$id' ,current_timestamp())";
                        $result=mysqli_query($con,$query);
                        
                    }              
                    ?>

                        <?php
                      
                      $id=$_GET['get'];
                      $sqli="SELECT * FROM `comment` WHERE postp_id=$id ";
                      $result=mysqli_query($con,$sqli);
                      while ($row=mysqli_fetch_assoc($result)) {
                          $com_id=$row['come_id'];
                          $com_dec=$row['come_dec'];
                          $com_by=$row['come_by'];
                          $com_date=$row['come_date'];
                          
                          echo '   
                          <div class="tm-comment tm-mb-45">
                          <figure class="tm-comment-figure">
                              <img src="img/coment.jpg" alt="Image" class="mb-2 rounded-circle img-thumbnail" style="width:70px; height:70px;">
                              <figcaption class="tm-color-primary text-center">'.$com_by.'</figcaption>
                          </figure>
                          <div>
                              <p>
                                '.$com_dec.'
                              </p>
                              <div class="d-flex justify-content-between">
                                  
                                  <span class="tm-color-primary">'.$com_date.'</span>
                              </div>
                              <hr>
                          </div>
                      </div>';
                      }
                    ?>
                    </div>
                </div>
            </div>

            <aside class="col-lg-4 tm-aside-col">
                <div class="tm-post-sidebar">
                    <hr class="mb-3 tm-hr-primary">
                    <h2 class="mb-4 tm-post-title tm-color-dark">Categories</h2>
                    <ul class="tm-mb-75 pl-5 tm-category-list">
                        <?php
             $sql="SELECT DISTINCT pol_cat FROM `politic`";
             $result=mysqli_query($con,$sql);
             while($row=mysqli_fetch_assoc($result)){
                 $pol_cat=$row['pol_cat'];
             echo '<li><a href="catagories.php?catagory='.$pol_cat.'" class="tm-color-primary">'.$pol_cat.'</a></li>';
             }

             ?>

                        <li><a href="#" class="tm-color-primary">Coming Soon</a></li>

                    </ul>
                    <hr class="mb-3 tm-hr-primary">
                    <h2 class="tm-mb-40 tm-post-title tm-color-dark">Related Posts</h2>
                    <?php
                
                    $cat=$_GET['cat'];
                
                      $sql="SELECT * FROM `politic` WHERE `pol_cat`='$cat' LIMIT 4";
                      $result=mysqli_query($con,$sql);
                     $num_rows=mysqli_num_rows($result);
                     if ($num_rows>1) {
                    
                      while ($row=mysqli_fetch_assoc($result)) {
                          $pol_id=$row['pol_id'];
                          $pol_cat=$row['pol_cat'];
                          $pol_dec=$row['pol_dec'];
                          $pol_img=$row['pol_img'];
                          $pol_title=$row['pol_title'];
                          echo ' <a href="post.php?get='.$pol_id.'&cat='.$pol_cat.'" class="d-block tm-mb-40">
                          <figure>
                              <img src="politicsimg/'.$pol_img.'" alt="Image" class="mb-3 img-fluid">
                              <figcaption class="tm-color-primary">'.$pol_title.'
                              </figcaption>
                          </figure>
                      </a>';
                      }
                     }else{
                         echo '<h3>Nothing To Show  Related Thsese Post</h3>';
                     }
                    ?>
                    <hr class="mb-3 tm-hr-primary">
                    <div class="blog-tags margin-bottom-20">
                        <h2>Tags</h2>
                        <ul>
                            <?php      
                        $id=$_GET['get'];
                           $sql="SELECT * FROM `tag` WHERE pol_id=$id";
                           $result=mysqli_query($con,$sql);
                           while ($row=mysqli_fetch_assoc($result)) {
                               $tag=$row['tag'];
                              echo '<li><a href="javascript:;"><i class="fa fa-tags"></i>'.$tag.'</a></li>';
                           }
                        ?>
                        </ul>
                    </div>
                </div>
            </aside>
    </div>
    <?php 
    include "footer.php";
    ?>
    </main>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->

    <!-- pop up -->

    <script src="assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>

</body>

</html>