<?php
                    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="ckeditor/ckeditor.js"></script>
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
                <h3>Update</h3>

                <?php
                $id=$_GET['id'];
                     $sql="SELECT * FROM `politic` WHERE pol_id=$id";
                     $result=mysqli_query($con,$sql);
                     while ($row=mysqli_fetch_assoc($result)) {
                           $pol_title=$row['pol_title'];
                           $pol_dec=$row['pol_dec'];
                           $pol_id=$row['pol_id'];
                           $pol_img=$row['pol_img'];
                           $pol_cat=$row['pol_cat'];
                           
                     }

            ?>

                <hr class="tm-hr-primary tm-mb-37">

                <form method="POST" action="<?php $_SERVER['REQUEST_URI']?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                            value="<?php echo $pol_title?>" aria-describedby="emailHelp" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Import Image</label>
                        <input type="text" name="img" class="form-control" id="exampleInputEmail1"
                            value="<?php echo $pol_img?>" aria-describedby="emailHelp" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Add Type</label>
                        <input type="text" name="cat" class="form-control" id="exampleInputEmail1"
                            value="<?php echo $pol_cat?>" aria-describedby="emailHelp" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea name="dec" class="form-control" id="exampleFormControlTextarea1" rows="5"
                            required><?php echo $pol_dec?></textarea>
                    </div>

                    <button type="submit" name="update" class="btn btn-info">Update</button>
                </form>
                <?php
                $id=$_GET['id'];
                $method=$_SERVER['REQUEST_METHOD'];
                if ($method=="POST" || isset($_POST['update'])) {
                  $polu_title=$_POST['title'];
                  $polu_dec=$_POST['dec'];
                  $polu_img=$_POST['img'];
                  $polu_cat=$_POST['cat'];

                    $sqli="UPDATE `politic` SET `pol_id`='$id',`pol_title`='$polu_title',`pol_dec`='$polu_dec',`pol_img`='$polu_img',`pol_cat`='$polu_cat' WHERE pol_id=$id";
                    $result=mysqli_query($con,$sqli);
                  if(!$result){ 
                      echo  "not updated";
                  }
                  
                }
               
                ?>


                <hr class="tm-hr-primary tm-mb-37">
            </div>
            <div class="row tm-row tm-mt-100 tm-mb-75">
                <div class="tm-prev-next-wrapper">
                    <a href="#" class="mb-2 tm-btn tm-btn-primary tm-prev-next disabled tm-mr-20">Prev</a>
                    <a href="#" class="mb-2 tm-btn tm-btn-primary tm-prev-next disabled tm-mr-20">Next</a>
                </div>
                <div class="tm-paging-wrapper">
                    <span class="d-inline-block mr-3">Page</span>
                    <nav class="tm-paging-nav d-inline-block">
                        <ul>
                            <li class="tm-paging-item active">
                                <a href="#" class="mb-2 tm-btn tm-paging-link ">1</a>
                            </li>
                            <li class="tm-paging-item">
                                <a href="#" class="mb-2 tm-btn tm-paging-link disabled tm-mr-20">2</a>
                            </li>
                            <li class="tm-paging-item">
                                <a href="#" class="mb-2 tm-btn tm-paging-link disabled tm-mr-20">3</a>
                            </li>
                            <li class="tm-paging-item">
                                <a href="#" class="mb-2 tm-btn tm-paging-link disabled tm-mr-20">4</a>
                            </li>
                        </ul>
                    </nav>
                </div>
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
    CKEDITOR.replace('dec');
    </script>
</body>

</html>