<?php
include "C:xampp\htdocs\p2\dbcon.php";
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | General Form Elements</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">


        <?php
  include "panle.php";
  ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>General Setting</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Setting</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <?php
      $sql="SELECT * FROM `contact_detail` WHERE cont_id=3";
      $result=mysqli_query($con,$sql);
      while ($row=mysqli_fetch_assoc($result)) {
          $address=$row['cont_address'];
          $name=$row['cont_by'];
          $mobile=$row['cont_mobile'];
          $email=$row['cont_email'];
          $post=$row['profile_post'];
          $desc=$row['profile_desc'];
          $img=$row['profile_img'];
          $left_footer=$row['left_footer'];
          $right_footer=$row['right_footer'];
      }   
      
   ?>


                    <div class="card-body">
                        <div class="container-fluid my-2">
                            <h2 style="color:gray">Contact Setting</h2>
                        </div>

                        <form method="POST">
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="by" value="<?php echo $name ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" name="mobile" value="<?php echo $mobile ?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Address(contact page)</label>
                                        <textarea class="form-control" name="address"
                                            rows="6"> <?php echo $address?> </textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Textarea Disabled</label>
                                        <textarea class="form-control" rows="6" disabled></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?php echo $email ?>"
                                            class="form-control">
                                    </div>

                                    <div class="container-fluid my-3">
                                        <h2 style="color:gray">Profile Setting</h2>
                                    </div>


                                    <div class="form-group">
                                        <label> Blogger Desciption(contact page)</label>
                                        <textarea class="form-control" name="desc"
                                            rows="6"> <?php echo $desc?> </textarea>
                                    </div>

                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Post</label>
                                        <input type="text" name="posts" value="<?php echo $post ?>"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="img" class="
                                                custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">
                                                    <?php echo $img ?> </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="container-fluid my-3">
                                        <h2 style="color:gray">Footer Setting</h2>
                                    </div>



                                    <div class="form-group">
                                        <label>Left Footer</label>
                                        <input type="text" name="left_footer" value="<?php $left_footer ?>"
                                            class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Right Footer</label>
                                        <input type="text" name="right_footer" value="<?php $right_footer ?>"
                                            class="form-control" required>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" name="save"
                                            class="btn btn-info swalDefaultSuccess">Save</button>

                                        <a href="home.php"><button type="submit" name="cancel"
                                                class="btn btn-danger">Cancel</button></a>
                                    </div>


                                </div>
                        </form>

                        <?php 
                             if($_SERVER['REQUEST_METHOD']=='POST' || isset($_POST['save'])){
                                   $name=$_POST['by'];
                                   $address=$_POST['address'];
                                   $mobile=$_POST['mobile'];
                                   $email=$_POST['email'];
                                   $desc=$_POST['desc'];
                                    $img=$_POST['img'];
                                     $post=$_POST['posts'];
                                     $left_footer=$_POST['left_footer'];
                                     $right_footer=$_POST['right_footer'];
                                     $sql="UPDATE `contact_detail` SET `cont_address`='$address',`cont_mobile`='$mobile',`cont_email`='$email',`cont_by`='$name',`profile_post`='$post',`profile_desc`='$desc',`profile_img`='$img',`left_footer`='$left_footer',`right_footer`='$right_footer' WHERE `contact_detail`.`cont_id` = 3";
                                         $result=mysqli_query($con,$sql);
                                         
                                        }
                                             ?>




                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.5
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
    </script>
    <?php
      if($result){
        echo "<script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    
        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        </script>";
    }
    ?>

</body>