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
                            <h1>Blog Managment</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Blog Managment</li>
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
                            <h3 class="card-title">Add Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="<?php echo $_SERVER['REQUEST_URI']?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Add Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Add Catagory</label>
                                    <input type="text" name="type" class="form-control" id="exampleInputEmail1"
                                        required>
                                    <small id="emailHelp" class="form-text text-muted">e.g
                                        Contrvarecy ,Cluture,Events,Scams,Manifesto,
                                        etc.</small>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Source Link</label>
                                    <input type="text" name="source" class="form-control" id="exampleInputEmail1"
                                        placeholder="Paste Source link">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Add Cover Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="img" class="custom-file-input"
                                                id="exampleInputFile" required>
                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                file</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group my-3">
                                    <label for="exampleFormControlTextarea1">Discripition</label>
                                    <textarea name="textarea" class="form-control" id="exampleFormControlTextarea1"
                                        rows="6" required></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info toastrDefaultSuccess">Add
                                    Post</button>
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
        
                   $post_img=$_POST['img'];
                   $post_title=$_POST['title'];
                   $post_dec=$_POST['textarea'];
                   $post_type=$_POST['type'];
                   $post_soc=$_POST['source'];
                   $sql="INSERT INTO `politic` (`pol_id`, `pol_title`, `pol_dec`,`pol_img`,`pol_cat`,`pol_soc` ,`pol_date`) VALUES (NULL, '$post_title', '$post_dec','$post_img','$post_type','$post_soc',current_timestamp())";
                   $result=mysqli_query($con,$sql);
                   if($result){
                     echo " <script>
                     $('.toastrDefaultSuccess').click(function() {
                         toastr.success('Blog Added Successfully')
                     });
                     </script>";
                
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