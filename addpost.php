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
    include "header.php";
    ?>


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
                   $post_img=$_POST['img'];
                   $post_title=$_POST['title'];
                   $post_dec=$_POST['textarea'];
                   $post_type=$_POST['type'];
                   $sql="INSERT INTO `politic` (`pol_id`, `pol_title`, `pol_dec`,`pol_img`,`pol_cat` ,`pol_date`) VALUES (NULL, '$post_title', '$post_dec','$post_img','$post_type',current_timestamp())";
                   $result=mysqli_query($con,$sql);
                }
              ?>

                <hr class="tm-hr-primary tm-mb-55">

            </div>

            <?php
           include "footer.php";
           ?>
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