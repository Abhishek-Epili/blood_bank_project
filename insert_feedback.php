<?php
error_reporting(0);
session_start();
$conn = new mysqli("localhost", "root", "", "blood_bank", 3307);
if ($conn->connect_error) {
    die("Unable to Connect database: " . $conn->connect_error);
} else {
    
        if($_SESSION["receiver_log"] == "yes"){
            $name=$_SESSION["receiver_name"];
        }
        else{
            $name=$_SESSION["hospital_name"];
        }
        $service = $_POST["service"];
        $website = $_POST["website"];
        $suggestions = $_POST["suggestions"];
        $sql = "INSERT INTO feedback (name, service_rating, website_rating, suggestions) VALUES ( '$name', '$service', '$website', '$suggestions');";
        if($conn->query($sql)){
            echo "<script>location.href='feedback.php';</script>";
        }
    }
?>