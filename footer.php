<?php
include "dbcon.php";
?>

<?php
 $sql="SELECT * FROM `contact_detail`";
 $result=mysqli_query($con,$sql);
 while ($row=mysqli_fetch_assoc($result)) {
     $foot_det1=$row['left_footer'];
     $foot_det2=$row['right_footer'];
  
     echo '<footer class="row tm-row">
     <hr class="col-12">
     <div class="col-md-6 col-12 tm-color-gray">
       '.$foot_det1.'
     </div>
     <div class="col-md-6 col-12 tm-color-gray tm-copyright">
        '.$foot_det2.'
     </div>
 </footer>';
 }
?>
<footer class="new_footer_area bg_color">
    <div class="new_footer_top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.4s"
                        style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                        <h3 class="f-title f_600 t_color f_size_18">Quick Link</h3>
                        <ul class="list-unstyled f_list">
                            <li><a href="politics.php?page=1">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#exampleModal">Login</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s"
                        style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                        <h3 class="f-title f_600 t_color f_size_18">About</h3>
                        <ul class="list-unstyled f_list">
                            <li><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt dolores minus
                                </a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s"
                        style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                        <h3 class="f-title f_600 t_color f_size_18">Follow US</h3>
                        <div class="f_social_icon">
                            <a href="#" class="fab fa-facebook"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-linkedin"></a>
                            <a href="" class="fab fa-instagram"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bg">
            <div class="footer_bg_one"></div>
            <div class="footer_bg_two"></div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-7">
                    <p class="mb-0 f_400">Copyright 2020-2021 XBlog Ltd</p>
                </div>

            </div>
        </div>
    </div>
</footer>