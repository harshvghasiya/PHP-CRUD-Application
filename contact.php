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
                    <div class="gmap_canvas">
                        <!-- Google Map -->
                        <iframe width="100%" height="477" id="gmap_canvas"
                            src="https://maps.google.com/maps?q=Av.+Bhavnagar+de+Gujarat+-+Bhvnagar,+INDIA&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                </div>
            </div>
            <div class="row tm-row tm-mb-120">
                <div class="col-12">
                    <h2 class="tm-color-primary tm-post-title tm-mb-60">Contact Us</h2>
                </div>
                <div class="col-lg-7 tm-contact-left">
                    <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']?>"
                        class="mb-5 ml-auto mr-0 tm-contact-form">
                        <div class="form-group row mb-4">
                            <label for="name" class="col-sm-3 col-form-label text-right tm-color-primary">Name</label>
                            <div class="col-sm-9">
                                <input class="form-control mr-0 ml-auto" name="name" id="name" type="text" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="email" class="col-sm-3 col-form-label text-right tm-color-primary">Email</label>
                            <div class="col-sm-9">
                                <input class="form-control mr-0 ml-auto" name="email" id="email" type="email" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="subject"
                                class="col-sm-3 col-form-label text-right tm-color-primary">Subject</label>
                            <div class="col-sm-9">
                                <input class="form-control mr-0 ml-auto" name="subject" id="subject" type="text"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <label for="message"
                                class="col-sm-3 col-form-label text-right tm-color-primary">Message</label>
                            <div class="col-sm-9">
                                <textarea class="form-control mr-0 ml-auto" name="message" id="message" rows="8"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="form-group row text-right">
                            <div class="col-12">
                                <button class="tm-btn tm-btn-primary tm-btn-small" name="submit">Send</button>
                            </div>
                        </div>
                    </form>
                    <?php
   if ($_SERVER['REQUEST_METHOD']=='POST'||isset($_POST['submit'])) {
      $user_name=$_POST['name'];
      $user_email=$_POST['email'];
      $user_massage=$_POST['message'];
      $user_subject=$_POST['subject'];
    $sql="INSERT INTO `contact_user` ( `user_name`, `user_email`, `user_subject`,`user_massge`,`user_date`) VALUES ('$user_name' , '$user_email', '$user_subject', '$user_massage',current_timestamp())";
   $result=mysqli_query($con,$sql);  
}

?>



                </div>
                <?php  
                $sql="SELECT * FROM `contact_detail` WHERE cont_id=3";
                $result=mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    $name=$row['cont_by'];
                    $email=$row['cont_email'];
                    $mobile=$row['cont_mobile'];
                    $address=$row['cont_address'];
                    $post=$row['profile_post'];
                    $descript=$row['profile_desc'];
                    $img=$row['profile_img'];
                
                    echo ' <div class="col-lg-5 tm-contact-right">
                    <address class="mb-4 tm-color-gray">
                    Address:
                   '.$address.'
                </address>
                <span class="d-block">
                    Mobile :<a href="tel:'.$mobile.'" class="tm-color-gray"> '.$mobile.'</a>
                </span>
                <span class="mb-4 d-block">
                    Email: <a href="mailto:info@company.com" class="tm-color-gray"> '.$email.'</a>

                </span>
                <p value="by" class="mb-5 tm-line-height-short">
                    By-<b>'.$name.'</b>
                </p> 
                <h2 class="tm-color-primary">PROFILE</h2>
                <div class="media tm-person my-4">
               
                    <img src="profileimg/'.$img.'" alt="Image" style="width:140px; height:210px;" class="img-fluid mr-4">
                    <div class="media-body">
                        <h2 class="tm-color-primary tm-post-title mb-2">'.$name.'</h2>
                        <h4 class="tm-color-black-h3 mb-3 ">'.$post.'</h4>
                        <p class="mb-0 tm-line-height-short">
                            '.$descript.'
                        </p>
                    </div>
                </div>';
                }
                ?>
                <ul class="tm-social-links">
                    <li class="mb-2">
                        <a href="https://facebook.com/harsh_vghasiya"
                            class="d-flex align-items-center justify-content-center">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="https://twitter.com/harsh_vghasiya"
                            class="d-flex align-items-center justify-content-center">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="https://youtube.com/harsh_vghasiya"
                            class="d-flex align-items-center justify-content-center">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="https://instagram.com/harsh_vghasiya"
                            class="d-flex align-items-center justify-content-center mr-0">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                </ul>





            </div>
    </div>



    <?php
          include "footer.php";
          ?>
    </main>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>

</html>