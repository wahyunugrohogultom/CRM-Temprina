<?php
session_start();  
include 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
  $data = mysqli_fetch_assoc($login);
  if($data['level'] == 'Admin'){
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['level'] = 'Admin';
    header("location:adm-dashboard.php");
    
  }else if($data['level'] == 'hc'){
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['level'] = 'hc';
    header("location:hc-dashboard.php");

  }else if($data['level'] == 'marketing'){
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['level'] = 'marketing';
    header("location:mrkt-dashboard.php");

  }else if($data['level'] == 'Sales'){
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['level'] = 'Sales';
    header("location:sls-dashboard.php");

  }
  else{
    header("location:login.php");
  }
}else{
  header("location:login.php");
}


?>