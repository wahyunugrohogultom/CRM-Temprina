<?php require 'connect.php'; ?>
<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
	//jika tombol simpan diklik
	if(isset($_POST['submit']))
	{
		//Pengujian Apakah data akan diedit atau disimpan baru
		if($_GET['hal'] == "keluar")
		{
			//Data akan di edit
			$edit = mysqli_query($connect, "UPDATE absen_sales set
											 	nama = '$_POST[nama]',
											 	tanggal = '$_POST[date]',
												jam_keluar = '$_POST[time]'
											 WHERE id = '$_GET[id]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='sls-absen.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='sls-absen.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($connect, "INSERT INTO absen_sales (nama, tanggal, jam_masuk)
										  VALUES ('$_POST[nama]', 
										  		 '$_POST[date]', 
										  		 '$_POST[time]')
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='sls-absen.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='sls-absen.php';
				     </script>";
			}
		}


		
	}


	//Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "edit")
		{
			//Tampilkan Data yang akan diedit
			$tampil = mysqli_query($connect, "SELECT * FROM absen_sales WHERE id = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vbesar = $data['tanggal'];
				$vketentuan = $data['jam_keluar'];
			}
		}
	}

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Sales</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <script type="text/javascript">
            function showTime(){
                var a_p = "";
                var today = new Date();
                var curr_hour = today.getHours();
                var curr_minute = today.getMinutes();
                var curr_second = today.getSeconds();

                if (curr_hour < 12) {
                    a_p = "AM";
                } else {
                    a_p = "PM";
                }

                if (curr_hour == 0) {
                    curr_hour = 12;
                }if (curr_hour > 12) {
                    curr_hour = curr_hour - 12;
                }
                curr_hour = checkTime(curr_hour);
                curr_minute = checkTime(curr_minute);
                curr_second = checkTime(curr_second);

                document.getElementById('time').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
            }
            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            } 
            setInterval(showTime, 500);
        </script>
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
                    <a class="nav-link" href="sls-dashboard.php">
                        <span>Dashboard</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="sls-absen.php">
                        <span>Absensi</span></a>
                </li>
                <li class="nav-item active">    
                    <a class="nav-link" href="sls-kegiatan-progres.php">
                        <span>Kegiatan & Progres</span></a>
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
                                    <a class="dropdown-item" href="profile-sls.php">
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

                        <!-- Page Heading -->
                    <div class="row">
                        <div class="card mb-6 w-50">
                            <div class="card-header bg-primary text-white ">
                                Absen
                            </div>
                            <div class="card-body">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="nama_kegiatan">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $_SESSION['nama']?><?=@$vjenis?>" placeholder="Nama Kegiatan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal</label>
                                        <textarea rows="1" class="form-control" id="date" name="date" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="waktu">Waktu</label>
                                        <textarea cols="1" rows="1" class="form-control" id="time" name="time" class="border-hiden" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit">Masuk / Keluar</button>
                                    
                                </form>
                            </div>
                        </div>
                        <div class="card w-50">
                            <div class="card-header bg-success text-white">
                                Dafttar Absen
                            </div>
                            <div class="card-body text-center">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <?php
                                            $no = 1;
                                            $tampil = mysqli_query($connect, "SELECT * from absen_sales order by id desc");
                                            while($data = mysqli_fetch_array($tampil)) :

                                        ?>
                                        <tr>
                                            <td><?=$data['nama']?></td>
                                            <td><?=$data['tanggal']?></td>
                                            <td><?=$data['jam_masuk']?></td>
                                            <td><?=$data['jam_keluar']?></td>
                                            <td>
                                                <a href="sls-absen.php?hal=keluar&id=<?=$data['id']?>" class="btn btn-danger"> Keluar </a>
                                            </td>
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
        
        <style type='text/css'>
            input.form-control{
                border-bottom: none;
                border-top: none;
                border-left: none;
                border-right: none;
                
            }
            textarea.form-control{
                border-bottom: none;
                border-top: none;
                border-left: none;
                border-right: none;
            }
        </style>

        <script>
            var months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth();
            var yy = date.getFullYear();
            var hh = date.getHours();
            
            document.getElementById('date').innerHTML = yy + '-' + months[month] + '-' + day;
        </script>

    </body>

    
    </html>