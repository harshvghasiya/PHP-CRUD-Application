<?php
include "dbcon.php";
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
    <link href="css/footer.css" rel="stylesheet">
    <!--
    
TemplateMo 553 Xtra Blog

https://templatemo.com/tm-553-xtra-blog

-->
</head>

<body>

    <div class="container">
        <main class="main">

            <div class="row tm-row tm-mb-45">
                <div class="col-12">
                    <hr class="tm-hr-primary tm-mb-55">
                    <img src="img/blog.png" alt="Image" class="img-fluid">
                </div>
            </div>

            <div class="row tm-row tm-mb-40">
                <div class="col-12">
                    <div class="mb-4">
                        <?php
            $sql="SELECT * FROM `about_page`";
            $result=mysqli_query($con,$sql);
            while ($row=mysqli_fetch_assoc($result)) {
                    
                    $about_dec=$row['about_description'];
                    $about_title=$row['about_title'];
                    echo '<h2 class="pt-2 tm-mb-40 tm-color-primary tm-post-title">'.$about_title.'</h2>
                    <p>
                       '.$about_dec.'
                    </p>';
            }
            ?>

                    </div>
                </div>
                <div class="col-12">
                    <hr class="tm-hr-primary  tm-mb-55">
                </div>

            </div>


            <footer class="row tm-row">
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
</body>

</html>