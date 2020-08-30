<?php
include "C:xampp\htdocs\p2\dbcon.php";
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php
  include "panle.php";
  ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Manage Blogs</h1>
                        </div>
                        <div class="col-sm-6">
                            <a href="addpost.php"><button class="btn btn-info ">Add New &nbsp <i
                                        class="fas fa-plus"></i></button></a>
                            <a href="#"><button class="btn btn-danger mx-1">Delete All &nbsp <i
                                        class="fas fa-trash"></i></button></a>

                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Manage Blogs</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Managing Block</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">

                                <thead>

                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Category(s)</th>
                                        <th>Delete</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                            $sql="SELECT * FROM `politic`";
                            $result=mysqli_query($con,$sql);
                            while ($row=mysqli_fetch_assoc($result)) {
                                $pol_id=$row['pol_id'];
                                $pol_title=$row['pol_title'];
                                $pol_dec=$row['pol_dec'];
                                $pol_date=$row['pol_date'];
                                $pol_cat=$row['pol_cat'];
                             
                                
                                echo ' 
                                      <tr>               
                                    <td>'.$pol_title.'</td>
                                    <td>'.substr($pol_dec,0,200).'....</td>
                                    <td>'.$pol_cat.'</td>
                                    <td><a href="ud.php?id='.$pol_id.'"><button type="submit" name="submitp" class="btn btn-danger my-2 my-sm-0">
                                            Delete</button></a>
                                    </td>
                                   
                                    <td>
                                    <a href="update.php?id='.$pol_id.'"><button type="submit" name="submitp" class="btn btn-warning my-2 my-sm-0">
                                    Update</button></a>
                                    </td>
                               
                                </tr>';
                         
                            }
                ?>
                                </tbody>
                            </table>
                            <?php
                            
                            $id=$_GET['id'];
                            $deletequery="DELETE FROM `politic` WHERE `politic`.`pol_id` = $id";
                            $results=mysqli_query($con,$deletequery);
                          
                            
                            ?>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- /.card -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b></b>
            </div>
            <strong>Copyright &copy; 2020-2021 <a href="http://adminlte.io">Harsh Vghasiya</a>.</strong> All rights
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
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            "paging": true,
            "ordering": true,
            "info": true,
            "responsive": true,

        });

    });
    </script>
</body>

</html>