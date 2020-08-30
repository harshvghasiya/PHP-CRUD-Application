<?php
include "dbcon.php";
?>
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
    <script src="ckeditor/ckeditor.js"></script>
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
                    <li class="tm-nav-item "><a href="index.php" class="tm-nav-link">
                            <i class="fas fa-home"></i>
                            Home
                        </a></li>

                    <li class=" dropdown tm-nav-item ">
                    <li class="tm-nav-item active" data-toggle="dropdown"><a href="#" class="tm-nav-link">
                            <i class="fas fa-pen"></i>
                            Opitions &nbsp <i class="fas fa-caret-down"></i>
                        </a></li>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="addpost.php">Add Post</a>
                        <a class="dropdown-item" href="#">Add Catagory</a>
                        <a class="dropdown-item" href="delete.php">Delete Posts</a>
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
            <div class="container">
                <hr class="tm-hr-primary tm-mb-55">

                <form method="POST" action="<?php $_SERVER['REQUEST_URI']?>">

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Add Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image Name</label>
                        <input type="text" name="img" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Add Type</label>
                        <input type="text" name="type" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">e.g Policy,Scams,Manifesto,Contrvarecy
                            etc.</small>
                    </div>
                    <h5 class="my-3" style="font-size:15px;">Select Catagory</h5>
                    <div class="form-check my-2">
                        <input class="form-check-input" type="radio" name="option" id="exampleRadios1" value="politics"
                            required>
                        <label class="form-check-label" for="exampleRadios1">
                            politics
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="exampleRadios2" value="economy"
                            required>
                        <label class="form-check-label" for="exampleRadios2">
                            Economy
                        </label>
                    </div>
                    <div class="form-group my-3">
                        <label for="exampleFormControlTextarea1">Discripition</label>
                        <textarea name="textarea" class="form-control" id="exampleFormControlTextarea1" rows="6"
                            required></textarea>
                    </div>

                    <button type="submit" name="submit" class="btn btn-info">Add Post</button>
                </form>

                <?php
                $method=$_SERVER['REQUEST_METHOD'];
             
                if($method=="POST" || isset($_POST['submit']) ){
                    $option=$_POST['option'];
                    
                    if($option=="politics"){
                   $post_img=$_POST['img'];
                   $post_title=$_POST['title'];
                   $post_dec=$_POST['textarea'];
                   $post_type=$_POST['type'];
                   $sql="INSERT INTO `politic` (`pol_id`, `pol_title`, `pol_dec`,`pol_img`,`pol_cat` ,`pol_date`) VALUES (NULL, '$post_title', '$post_dec','$post_img','$post_type',current_timestamp())";
                   $result=mysqli_query($con,$sql);
                }else{
                    if ($option=="economy") {
                        $post_img=$_POST['img'];
                        $post_title=$_POST['title'];
                        $post_dec=$_POST['textarea'];
                        $sql="INSERT INTO `economy` (`eco_id`, `eco_title`, `eco_dec`,`eco_img` ,`eco_date`) VALUES (NULL, '$post_title', '$post_dec','$post_img' ,current_timestamp());";
                        $result=mysqli_query($con,$sql);
                    }
                }
            }

                 ?>



                <hr class="tm-hr-primary tm-mb-55">

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
    <script>
    CKEDITOR.replace('textarea');
    </script>
</body>

</html>