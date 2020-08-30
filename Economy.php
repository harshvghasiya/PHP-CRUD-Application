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
    <!--
    
TemplateMo 553 Xtra Blog

https://templatemo.com/tm-553-xtra-blog

-->
</head>

<body>

    <?php 
    include "dbcon.php";
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
                    <li class="tm-nav-item active"><a href="index.php" class="tm-nav-link">
                            <i class="fas fa-home"></i>
                            Home
                        </a></li>

                    <li class=" dropdown tm-nav-item ">
                    <li class="tm-nav-item" data-toggle="dropdown"><a href="#" class="tm-nav-link">
                            <i class="fas fa-pen"></i>
                            Opitions &nbsp <i class="fas fa-caret-down"></i>
                        </a></li>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="addpost.php">Add Post</a>
                        <a class="dropdown-item" href="#">Add Catagory</a>
                        <a class="dropdown-item" href="delete.php">Delete/update Posts</a>
                    </div>

                    </li>


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
                <a rel="nofollow" href="https://fb.com/harsh_vghasiya" class="tm-social-link">
                    <i class="fab fa-facebook tm-social-icon"></i>
                </a>
                <a href="https://twitter.com/harsh_vghasiya" class="tm-social-link">
                    <i class="fab fa-twitter tm-social-icon"></i>
                </a>
                <a href="https://instagram.com/harsh_vghasiya" class="tm-social-link">
                    <i class="fab fa-instagram tm-social-icon"></i>
                </a>
                <a href="https://linkedin.com/harh_vghasiya" class="tm-social-link">
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
                    <form method="POST" class="form-inline tm-mb-80 tm-search-form">
                        <input class="form-control tm-search-input" name="query" type="text" placeholder="Search..."
                            aria-label="Search">
                        <button class="tm-search-button" type="submit">
                            <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="row tm-row">

                <?php
                     $limit=4;
                     $page=$_GET['page'];
                     $offset=($page-1)*$limit;
                     $sql="SELECT * FROM `economy` LIMIT {$offset},{$limit}";
                              $result=mysqli_query($con,$sql);
                              while ($row=mysqli_fetch_assoc($result)) {
                                  $eco_title=$row['eco_title'];
                                  $eco_desc=$row['eco_dec'];
                                  $eco_id=$row['eco_id'];
                                  $eco_date=$row['eco_date'];
                                  $eco_img=$row['eco_img'];
                                  $eco_type=$row['eco_type'];
                        
                                  echo '
                                  <article class="col-12 col-md-6 tm-post">
                                  <hr class="tm-hr-primary">
                                  <a href="poste.php?getE='.$eco_id.'" class="effect-lily tm-post-link tm-pt-60">
                                  <div class="tm-post-link-inner">
                                      <img src="ecoimg/'.$eco_img.'" style=" height:250px; alt="Image" class="img-fluid">
                                  </div>
                                  <span class="position-absolute tm-new-badge">'.$eco_type.'</span>
                                  <h2 class="tm-pt-30 tm-color-primary tm-post-title">'.$eco_title.'</h2>
                              </a>
                              <p class="tm-pt-30">
                                  '.substr($eco_desc,0,250).'
                              </p>
                              <div class="d-flex justify-content-between tm-pt-45">
                                  <span class="tm-color-primary">Politics.Goverment</span>
                                  <span class="tm-color-primary">'.$eco_date.'</span>
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
            <div class="row tm-row tm-mt-100 tm-mb-75 d-inline">

                <div class="tm-paging-wrapper d-inline">
                    <span class="d-inline-block mr-3">Page</span>
                    <nav class="tm-paging-nav d-inline-block">
                        <ul>

                            <?php
                                
                                $sql="SELECT * FROM `economy`";
                                $result=mysqli_query($con,$sql);
                                $limit=4;
                               $total_row=mysqli_num_rows($result);
                               if($total_row>0){
                                   $total_page=ceil($total_row/$limit);
                                   if($page==1){
                                       $disabled="";
                                   }else{
                                   echo '<a href="economy.php?page='.($page-1).'" class="mb-2 tm-btn tm-btn-primary tm-prev-next  tm-mr-20">Prev</a>';

                                   }
                                for ($i=1; $i <=$total_page; $i++) { 
                                   if($page==$i){
                                       $active="active";
                                   }
                                   else{
                                       $active="";
                                   }
                            echo ' <li class="tm-paging-item '.$active.'"><a href="economy.php?page='.$i.'" class="mb-2 tm-btn tm-paging-link d-inline-block px-3  py-2 mx-2 ">'.$i.'</a></li>';
                                        
                                }
                                if($page==$total_page){
                                    $disabled="";
                                }else{
                                echo '<a href="economy.php?page='.($page+1).'" class="mb-2 tm-btn tm-btn-primary tm-prev-next  tm-mr-20">Next</a>';

                                }
                            }
                                 
                                ?>


                        </ul>
                    </nav>
                </div>
            </div>
            <footer class="row tm-row">
                <hr class="col-12">
                <div class="col-md-6 col-12 tm-color-gray">
                    Design: HV
                </div>
                <div class="col-md-6 col-12 tm-color-gray tm-copyright">
                    Copyright 2020-2021 XBlog Ltd.
                </div>
            </footer>
        </main>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
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
</body>

</html>