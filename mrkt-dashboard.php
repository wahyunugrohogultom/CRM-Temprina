<?php require 'connect.php'; ?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Marketing</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">

                </div>
                <div class="sidebar-brand-text mx-3">Temprina<sup>v2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="mrkt-dashboard.php">
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="mrkt-kegiatan-marketing.php">
                    <span>Kegiatan Marketing</span></a>
            </li>
            <li class="nav-item active">    
                <a class="nav-link" href="mrkt-diskon.php">
                    <span>Diskon</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="mrkt-anggaran-biaya.php">
                    <span>Anggaran Biaya</span></a>
            </li>


            
            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama']?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile-mrkt.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div>
                        <h1 class="h3 mb-2 text-gray-800 text-center">Selamat Datang <?php echo $_SESSION['nama']?> </h1>
                    </div>
                    <br />

                    <div class="row">
                        <div class="card w-50">
                            <div class="card-header bg-danger text-center text-white">
                                Daftar Diskon
                            </div>
                            <div class="card-body text-center">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>Kode Diskon</th>
                                        <th>Besar Diskon (%)</th>
                                        <th>Ketentuan</th>
                                    </tr>
                                    <?php
                                            $no = 1;
                                            $tampil = mysqli_query($connect, "SELECT * from diskon order by id desc");
                                            while($data = mysqli_fetch_array($tampil)) :

                                        ?>
                                        <tr>
                                            <td><?=$data['kode_diskon']?></td>
                                            <td><?=$data['besar_diskon']?></td>
                                            <td><?=$data['ketentuan']?></td>
                                        </tr>
                                    <?php endwhile; //penutup perulangan while ?>
                                </table>
                            </div>
                        </div>

                        <div class="card w-50">
                            <div class="card-header bg-success text-center text-white">
                                Daftar Kegiatan Marketing
                            </div>
                            <div class="card-body text-center">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>Nama Kegiatan</th>
                                        <th>Tanggal Kegiatan</th>
                                        <th>Keterangan Kegiatan</th>
                                    </tr>
                                    <?php
                                            $no = 1;
                                            $tampil = mysqli_query($connect, "SELECT * from kegiatan_marketing order by id desc");
                                            while($data = mysqli_fetch_array($tampil)) :

                                        ?>
                                        <tr>
                                            <td><?=$data['jenis_kegiatan']?></td>
                                            <td><?=$data['tanggal_kegiatan']?></td>
                                            <td><?=$data['rincian']?></td>
                                        </tr>
                                    <?php endwhile; //penutup perulangan while ?>
                                </table>
                            </div>
                        </div>
                    </div>

                    <br />

                    <div class="row">
                        <div class="card w-50">
                                <div class="card-header bg-primary text-center text-white">
                                    Daftar Angaran Biaya
                                </div>
                                <div class="card-body text-center">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <th>Bulan</th>
                                            <th>Volume</th>
                                            <th>Biaya</th>
                                        </tr>
                                        <?php
                                                $no = 1;
                                                $tampil = mysqli_query($connect, "SELECT * from anggaran_biaya order by id desc");
                                                while($data = mysqli_fetch_array($tampil)) :

                                            ?>
                                            <tr>
                                                <td><?=$data['Uraian']?></td>
                                                <td><?=$data['Volume']?></td>
                                                <td><?=$data['Biaya']?></td>
                                            </tr>
                                        <?php endwhile; //penutup perulangan while ?>

                                    </table>
                                </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            

                            <!-- Color System -->
                        

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            
                            <!-- Approach -->
                            

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>