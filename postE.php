<?php include "dbcon.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xtra Blog</title>
    <link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- https://fonts.google.com/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-xtra-blog.css" rel="stylesheet">
    <!--
    
TemplateMo 553 Xtra Blog

https://templatemo.com/tm-553-xtra-blog

-->
</head>

<body>
    <?php
    include "loginmodal.php";
    include "singupmodal.php";
    ?>
    <header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">
                <div class="mb-3 mx-auto tm-site-logo"><i class="fas fa-times fa-2x"></i></div>
                <h1 class="text-center">XBlog</h1>
            </div>
            <nav class="tm-nav" id="tm-nav">
                <ul>
                    <li class="tm-nav-item"><a href="index.php" class="tm-nav-link">
                            <i class="fas fa-home"></i>
                            Home
                        </a></li>

                    <li class="tm-nav-item"><a href="about.php" class="tm-nav-link">
                            <i class="fas fa-users"></i>
                            About
                        </a></li>
                    <li class="tm-nav-item"><a href="contact.php" class="tm-nav-link">
                            <i class="far fa-comments"></i>
                            Contact Us
                        </a></li>
                    <?php
                    $login=false;                   
    if((isset($_SESSION['loggedin'])) && ($_SESSION['loggedin']==true)){
        $login=true;
      echo'
      <li class="tm-nav-item " ><a href="logout.php" class="tm-nav-link">
      <i class="far fa-sign-out-alt"></i>
      Logout
  </a></li>
  <p class="text-light px-3">Welcome '.$_SESSION['username'].'</p> ';  
    }
    else {
    
        echo '  <li class="tm-nav-item " data-toggle="modal" data-target="#exampleModal"><a class="tm-nav-link">
        <i class="far fa-sign-in-alt"></i>
        Login
    </a></li>
<li class="tm-nav-item" data-toggle="modal" data-target="#signupModal"><a class="tm-nav-link">
        <i class="fa fa-user"></i>
        Sing UP
    </a></li>';
    }
    ?>
                </ul>
            </nav>
            <div class="tm-mb-65">
                <a href="https://facebook.com/harsh_vghasiya" class="tm-social-link">
                    <i class="fab fa-facebook tm-social-icon"></i>
                </a>
                <a href="https://twitter.com/harsh_vghasiya" class="tm-social-link">
                    <i class="fab fa-twitter tm-social-icon"></i>
                </a>
                <a href="https://instagram.com/harsh_vghasiya" class="tm-social-link">
                    <i class="fab fa-instagram tm-social-icon"></i>
                </a>
                <a href="https://linkedin.com/harsh_vghasiya" class="tm-social-link">
                    <i class="fab fa-linkedin tm-social-icon"></i>
                </a>
            </div>

        </div>
    </header>
    <div class="container-fluid">
        <main class="tm-main">
            <!-- Search form -->
            <div class="row tm-row">
                <div class="col-12">
                    <form method="GET" class="form-inline tm-mb-80 tm-search-form">
                        <input class="form-control tm-search-input" name="query" type="text" placeholder="Search..."
                            aria-label="Search">
                        <button class="tm-search-button" type="submit">
                            <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="row tm-row">
                <div class="col-lg-8 tm-post-col">

                    <?php
            $ids=$_GET['getE'];
            $sql="SELECT * FROM `economy` WHERE eco_id=$ids";
            $result=mysqli_query($con,$sql);
            while ($row=mysqli_fetch_assoc($result)) {
                $eco_title=$row['eco_title'];
                $eco_desc=$row['eco_dec'];
                $eco_id=$row['eco_id'];
                $eco_date=$row['eco_date'];
                $eco_img=$row['eco_img'];
       echo '
       
       <div class="row tm-row">
       <div class="col-12">
           <hr class="tm-hr-primary tm-mb-55">
           <!-- Video player 1422x800 -->
           <img src="ecoimg/'.$eco_img.'" class="d-block w-100" alt="...">

       </div>
   </div>
       
       <div class="tm-post-full">
       <div class="mb-4">
           <h2 class="pt-2 tm-color-primary tm-post-title">'.$eco_title.'</h2>
           <p class="tm-mb-40">'.$eco_date.'posted by Harsh</p>
          
           <p>
              '.$eco_desc.'
           </p>
           <span class="d-block text-right tm-color-primary">Truth . Fact </span>
       </div>';
      }
    ?>


                    <!-- Comments -->

                    <div>
                        <h2 class="tm-color-primary tm-post-title">Comments</h2>
                        <hr class="tm-hr-primary tm-mb-45">

                        <form action="<?php $_SERVER['REQUEST_URI']?>" class="mb-5 tm-comment-form" method="POST">
                            <h2 class="tm-color-primary tm-post-title mb-4">Your comment</h2>

                            <?php 
                              if((isset($_SESSION['loggedin'])) && ($_SESSION['loggedin']==true)){
                                  echo ' <div class="mb-4">
                                  <textarea class="form-control" name="message" rows="6"></textarea>
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
                    $coment=$_POST['message2'];
                    if (isset($_POST['submit']) && $coment!='') {
                      
                        $query="INSERT INTO `comment` (`come_id`, `come_dec`, `come_by`, `come_date`) VALUES (NULL, '$coment', 'bot', current_timestamp())";
                        $result=mysqli_query($con,$query);       
                    }   
                            
                    ?>

                        <?php
                      $id=$_GET['getE'];
                      $sqli="SELECT * FROM `comment` ";
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
                                  <a href="#" class="tm-color-primary">REPLY</a>
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
                    <h2 class="mb-4 tm-post-title tm-color-primary">Categories</h2>
                    <ul class="tm-mb-75 pl-5 tm-category-list">
                        <li><a href="politics.php" class="tm-color-primary">Politics</a></li>
                        <li><a href="Economy.php" class="tm-color-primary">Economy</a></li>
                        <li><a href="" class="tm-color-primary">Coming Soon</a></li>

                    </ul>
                    <hr class="mb-3 tm-hr-primary">
                    <h2 class="tm-mb-40 tm-post-title tm-color-primary">Related Posts</h2>
                    <?php
                
                    $id=$_GET['getE'];
                    $ids=$id+1;
                      $sql="SELECT * FROM `economy` WHERE eco_id=$ids";
                      $result=mysqli_query($con,$sql);
                      while ($row=mysqli_fetch_assoc($result)) {
                          $eco_id=$row['eco_id'];
                          $eco_cat=$row['eco_cat'];
                          $eco=$row['eco_dec'];
                          $eco_img=$row['eco_img'];
                          $eco_title=$row['eco_title'];
                          echo ' <a href="postE.php?getE='.$eco_id.'" class="d-block tm-mb-40">
                          <figure>
                              <img src="politicsimg/'.$eco_img.'" alt="Image" class="mb-3 img-fluid">
                              <figcaption class="tm-color-primary">'.$eco_title.'
                              </figcaption>
                          </figure>
                      </a>';
                      }
                    
                    ?>
                </div>
            </aside>
    </div>
    <footer class="row tm-row">
        <div class="col-md-6 col-12 tm-color-gray">
            Design: <a rel="nofollow" target="_parent" href="https://templatemo.com"
                class="tm-external-link">TemplateMo</a>
        </div>
        <div class="col-md-6 col-12 tm-color-gray tm-copyright">
            Copyright 2020 Xtra Blog Company Co. Ltd.
        </div>
    </footer>
    </main>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>

</html>