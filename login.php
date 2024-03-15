<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login | Temprina </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
  <body>
    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Login</span></div>
        <form action="#" method="POST">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="username" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="password" required>
          </div>
          <div class="row button">
            <a>
                <input type="submit" name="login" value="login">
            </a>
          </div>
        </form>
        <?php
        if(isset($_POST['login'])){
          include 'connect.php';
          $cek = mysqli_query($connect, "SELECT * FROM user WHERE 
          username = '".$_POST['username']."' AND password = '".$_POST['password']."'");
          $data = mysqli_fetch_array($cek);
          $level = $data['level'];
          $nama = $data['nama'];
          $username = $data['username'];
          $password = $data['password'];
          $level = $data['level'];
          $cek2 = mysqli_query($connect, "SELECT * FROM admin WHERE
          username = '".$_POST['username']."' AND password = '".$_POST['password']."'");
          $data2 = mysqli_fetch_array($cek2);
          $level2 = $data2['level'];
          $nama2 = $data2['nama'];
          $username2 = $data2['username'];
          $password2 = $data2['password'];
          $level2 = $data2['level'];

          if($level2 == 'Admin'){
            if($level2 == 'Admin'){
              session_start();
              $_SESSION['nama'] = $nama2;
              $_SESSION['username'] = $username2;
              $_SESSION['password'] = $password2;
              $_SESSION['level'] = $level2;
              header("location: adm-dashboard.php");
            }
          }else if(mysqli_num_rows($cek)>0){
            if($level == 'Admin'){
              session_start();
              $_SESSION['nama'] = $nama;
              $_SESSION['username'] = $username;
              $_SESSION['password'] = $password;
              $_SESSION['level'] = $level;
              header("location:adm-dashboard.php");
            }else if($level == 'HC'){
              session_start();
              $_SESSION['nama'] = $nama;
              $_SESSION['username'] = $username;
              $_SESSION['password'] = $password;
              $_SESSION['level'] = $level;
              header("location:hc-dashboard.php");
            }else if($level == 'Marketing'){
              session_start();
              $_SESSION['nama'] = $nama;
              $_SESSION['username'] = $username;
              $_SESSION['password'] = $password;
              $_SESSION['level'] = $level;
              header("location:mrkt-dashboard.php");
            }else if($level == 'Sales'){
              session_start();
              $_SESSION['nama'] = $nama;
              $_SESSION['username'] = $username;
              $_SESSION['password'] = $password;
              $_SESSION['level'] = $level;
              header("location:sls-dashboard.php");
            }else{
              echo "<script>alert('Username atau Password Salah')</script>";
            }
          }
        }
        ?>
      </div>
    </div>
  </body>
</html>