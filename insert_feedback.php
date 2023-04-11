<?php
error_reporting(0);
session_start();
$conn = new mysqli("localhost", "id20534660_root", "Blood_bank_123", "id20534660_blood_bank");
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