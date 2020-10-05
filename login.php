<?php

if (isset($_POST['login-submit']))
{
require 'db_connect.php';

$email = $_POST['email'];
$password = $_POST['pwd'];

if (empty($email)|| empty($password))
{
  header("location: /home.html?erroremptyfields");
  exit();
}
  else
    {
      $sql = "SELECT * FROM users WHERE username=? OR email=?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: /home.html?error=sqlerror");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt,"ss",$email,$email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
          $pwdCheck = password_verify($password,$row['pwd']);
          if ($pwdCheck == false) {
            header("location: /home.html?error=wrong_password");
            exit();
          }
          elseif ($pwdCheck == true) {
            session_start();
            $_SESSION['userid'] = $row['id'];
            $_SESSION['uid'] = $row['username'];

            header("location: /home.html?login=success");
            header("location: data_sets_auth.php");
            exit();

          }
          else {
            header("location: /home.html?error=wrong_password");
            exit();
          }
        }
        else {
          header("location: /home.html?error=no-user");
          exit();
        }
      }
    }
  }
  else {
    header("location: signup.php");
    exit();
  }
