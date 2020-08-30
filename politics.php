<?php
                    session_start();
                    include "loginmodal.php";
 include "singupmodal.php";
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
   
    include "header.php";
  
    ?>


    <div class="container-fluid">
        <main class="tm-main">


            <!-- Search form -->
            <div class="row tm-row">
                <div class="col-12">
                    <form method="get" class="form-inline tm-mb-80 tm-search-form" action="search.php">
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
                $sql="SELECT * FROM `politic` LIMIT {$offset},{$limit} ";
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
                                  <span class="tm-color-black">Catagory.'.$pol_cat.'</span>
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
            <div class="row tm-row tm-mt-100 tm-mb-75 d-inline">

                <div class="tm-paging-wrapper d-inline">
                    <span class="d-inline-block mr-3">Page</span>
                    <nav class="tm-paging-nav d-inline-block">
                        <ul>


                            <?php

                            $limit=4;
                            $sql="SELECT * FROM `politic`";
                            $result=mysqli_query($con,$sql);
                            $total_record=mysqli_num_rows($result);
                            if($total_record>0){
                                $total_page=ceil($total_record/$limit);
                                if($page==1){
                                    $disabled="disabled";
                                }else {
                                    $disabled="";
                                    echo   '<a href="politics.php?page='.($page-1).'" class="mb-2 tm-btn tm-btn-primary  tm-prev-next '.$disabled.' tm-mr-20">Prv</a>';

                                }
                                for ($i=1; $i <= $total_page; $i++) { 
                                    if($page==$i){
                                        $active="active";
    
                                    }else{
                                        $active="";
                                    }
                                echo '<li class="tm-paging-item '.$active.'"><a href="politics.php?page='.$i.'" class="mb-2 tm-btn tm-paging-link d-inline-block px-3 py-2 mx-1">'.$i.'</a></li>';

                                }
                                if($page==$total_page){
                                    $disabled="disabled";
                                }else{
                                    $disabled="";
                                    echo '<a href="politics.php?page='.($page+1).'" class="mb-2 tm-btn tm-btn-primary tm-prev-next '.$disabled.' tm-mr-20">Next</a>';

                                }
 
                                 
                            }


                            ?>





                        </ul>
                    </nav>
                </div>
            </div>

            <?php
           include "footer.php";
           ?>
        </main>
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