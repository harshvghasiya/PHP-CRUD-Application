<?php
include "C:xampp\htdocs\p2\dbcon.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | General Form Elements</title>
    <script src="ckeditor/ckeditor.js"></script>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
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
                            <h1>About Page Managment</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">About Managment</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <!-- general form elements -->
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">About</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        $sql="SELECT * FROM `about_page`";
                        $result=mysqli_query($con,$sql);
                        while ($row=mysqli_fetch_assoc($result)) {
                    
                            $about_dec=$row['about_description'];
                            $about_title=$row['about_title'];
                        }
                        ?>
                        <form role="form" method="POST" action="<?php echo $_SERVER['REQUEST_URI']?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                        value="<?php echo $about_title ?>">
                                </div>


                                <div class="form-group my-3">
                                    <label for="exampleFormControlTextarea1">Discripition</label>
                                    <textarea name="textarea" class="form-control" id="exampleFormControlTextarea1"
                                        rows="8"> <?php echo $about_dec ?></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info toastrDefaultSuccess">Edit
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </section>
            <!-- /.content -->
        </div>
        <?php
                $method=$_SERVER['REQUEST_METHOD'];
                if($method=="POST" || isset($_POST['submit']) ){
        
               
                   $post_title=$_POST['title'];
                   $post_dec=$_POST['textarea'];
                   
                   $sql="UPDATE `about_page` SET `about_description`='$post_dec',`about_title`='$post_title' WHERE `about_page`.`about_id`=1";
                   $result=mysqli_query($con,$sql);
                   if($result){
                     ?><script>
        alert('Done');
        </script>
        <?php
                    
                }
            }
                 ?>

        <!-- /.content-wrapper -->
        <footer class=" main-footer">
            <div class="float-right d-none d-sm-block">

            </div>
            <strong>Copyright &copy; 2020-2021 <a href="http://adminlte.io"> Bt Harsh
                    Vaghasiya</a>.</strong> All rights
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
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->

    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
    </script>

    <script>
    CKEDITOR.replace('textarea');
    </script>


</body>

</html>