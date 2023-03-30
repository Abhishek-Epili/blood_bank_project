<?php
$conn = new mysqli("localhost", "root", "", "blood_bank", 3307);
if ($conn->connect_error) {
  die("Unable to Connect database: " . $conn->connect_error);
} else {
  session_start();
  $email = $_POST["user"];
  $pass = $_POST["pass"];
  $login_type = $_POST["login_type"];
  if ($login_type == "Receiver") {
    $sql = "select * from user_data where email='$email' and pass='$pass'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      echo "<script>alert('Login Successful!');</script>";
      if ($row = $result->fetch_assoc()) {
        $_SESSION["receiver_log"] = "yes";
        $_SESSION["receiver_name"] = $row["name"];
        $_SESSION["receiver_bldgrp"] = $row["blood_grp"];
        echo "<script>location.href = 'view_blood_sample.php?user=receiver';</script>";
      }
    } else {
      echo "<script>alert('Invalid Login Details!');</script>";
      echo "<script>location.href = 'login.html';</script>";
    }
  } else if ($login_type == "Hospital") {
    $sql = "select * from hospital_data where email='$email' and pass='$pass'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      echo "<script>alert('Login Successful!');</script>";
      $row = $result->fetch_assoc();
      $_SESSION["hospital_log"] = "yes";
      $_SESSION["hospital_name"] = $row["name"];
      echo "<script>location.href = 'hospital_control.php';</script>";
    } else {
      echo "<script>alert('Invalid Login Details!');</script>";
      echo "<script>location.href = 'login.html';</script>";
    }
  }
  $conn->close();
}
?>