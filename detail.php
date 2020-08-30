<?php include "dbcon.php"?>
<!doctype html>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.ico" />
    <script src="js/jquery-1.4.2.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/jquery.jcarousel.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/functions.js" type="text/javascript" charset="utf-8"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css"
        integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->

    <title>Web!</title>
</head>

<body>

    <div class="container">

        <?php
            $ids=$_GET['getp'];
      $sql="SELECT * FROM `politic` WHERE pol_id=$ids";
      $result=mysqli_query($con,$sql);
      while ($row=mysqli_fetch_assoc($result)) {
         $pdet_title=$row['pol_title'];
         $pdet_dec=$row['pol_dec'];
         $pdet_date=$row['pol_date'];
         $pdet_id=$row['pol_id'];
       echo '<div class="jumbotron jumbotron-fluid">
       <div class="container">
         <h1 class="display-5"><b>'.   $pdet_title.'</b></h1>
        <p><span style="color:DeepSkyBlue;"><b>Uplod Date :</b></span> '.$pdet_date.'</p>
   
         <div id="carouselExampleSlidesOnly" class="carousel slide my-4" data-ride="carousel" >
         <div class="carousel-inner">
           <div class="carousel-item active">
               <img src="politicsimg/'.$pdet_id.'.jpg" class="d-block w-100" alt="...">
           </div>
          
         </div>
       </div>

         <p class="lead my-3" >&nbsp&nbsp'.substr($pdet_dec,0,200).',</p>
         <p class="lead my-3" >'.substr($pdet_dec,200,500).',</p>
         <p class="lead my-3" >'.substr($pdet_dec,500,1100).',</p>
         <p class="lead my-3" >'.substr($pdet_dec,1100,400000).'</p>
       </div>
     </div>';
      }
    ?>


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"
        integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous">
    </script>
</body>

</html>