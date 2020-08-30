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
                <hr class="tm-hr-primary tm-mb-37">
                <h3 class="tm-new-badge">Select Catagory To Delete Post</h3>

                <div class="table-responsive table-bordered">
                    <table class="table my-4">
                        <thead>
                            <tr class="bg-dark text-light">
                                <th scope="col">id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Handle</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <?php
                            $sql="SELECT * FROM `politic`";
                            $result=mysqli_query($con,$sql);
                            while ($row=mysqli_fetch_assoc($result)) {
                                $pol_id=$row['pol_id'];
                                $pol_title=$row['pol_title'];
                                $pol_dec=$row['pol_dec'];
                                $pol_date=$row['pol_date'];
                             
                                
                                echo ' <tbody>
                                <tr>
                                    <th scope="row">'.$pol_id.'</th>
                                    <td>'.$pol_title.'</td>
                                    <td>'.substr($pol_dec,0,25).'....</td>
                                    <td><a href="delete.php?id='.$pol_id.'"><button type="submit" name="submitp" class="btn btn-danger my-2 my-sm-0">
                                            Delete</button></a>
                                    </td>
                                    <td>
                                    <a href="Update.php?id='.$pol_id.'"><button type="submit" name="submitp" class="btn btn-warning my-2 my-sm-0">
                                    Update</button></a>
                                    </td>
                               
                                </tr>
                            </tbody>';
                            }
                ?>
                    </table>
                </div>
                <hr class="tm-hr-primary tm-mb-55">

            </div>
            <?php
               $id=$_GET['id'];
               $deletequery="DELETE FROM `politic` WHERE `politic`.`pol_id` = $id";
               $results=mysqli_query($con,$deletequery);
            ?>
            <div class="row tm-row tm-mt-100 tm-mb-75">
                <div class="tm-prev-next-wrapper">
                    <a href="#" class="mb-2 tm-btn tm-btn-primary tm-prev-next disabled tm-mr-20">Prev</a>
                    <a href="#" class="mb-2 tm-btn tm-btn-primary tm-prev-next disabled tm-mr-20">Next</a>
                </div>
                <div class="tm-paging-wrapper">
                    <span class="d-inline-block mr-3">Page</span>
                    <nav class="tm-paging-nav d-inline-block">
                        <ul>

                            <li class="tm-paging-item active"> <a href="#" class="mb-2 tm-btn tm-paging-link ">1</a>
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
</body>

</html>