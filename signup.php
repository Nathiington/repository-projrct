<?php
if (isset($_POST['signup-submit']))
{
  require 'db_connect.php';

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['pwd'];
  $password_repeat = $_POST['pwd-repeat'];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)) {
    header("location: signup.php?error=invalidemail");
    exit();
  }
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("location: signup.php?error=invalidemail&username".$username);
    exit();
  }

  elseif (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
    header("location: signup.php?error=invalidusername&email=".email);
    exit();
}
  elseif ($password !== $password_repeat) {
    header("location: signup.php?error=passwordcheck&username=".$username."&email".$email);
    exit();
  }
  else {
    $sql = "SELECT username FROM users WHERE username=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
      header("location: signup.php?error=sqlerror");
      exit();
    }
  else {
    mysqli_stmt_bind_param($stmt,"s", $username,);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultcheck=mysqli_stmt_num_rows($stmt);
    if ($resultcheck > 0) {
      header("location: signup.php?error=usernametaken&email".$email);
      exit();
    }
    else {
      $sql = "INSERT INTO users (username,email,pwd) VALUES (?,?,?)";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: signup.php?error=sqlerror");
        exit();
      }
      else {
        $pvtpwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt,"sss", $username,$email,$pvtpwd);
        mysqli_stmt_execute($stmt);
        header("location: signup.php?signup=success");
        header("location: data_sets_auth.php");
        exit();
      }
    }
  }
}
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
/*else {
  header("location: signup.php");
  exit();
}
*/
