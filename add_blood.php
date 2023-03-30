
<?php
$conn = new mysqli("localhost", "root", "", "blood_bank", 3307);
if ($conn->connect_error) {
    die("Unable to Connect database: " . $conn->connect_error);
} else {
    session_start();
    try {
        if ($_SESSION["hospital_log"] == "yes") {
            $bldgrp = $_POST["bldgrp"];
            $quantity = $_POST["quantity"] . "ml";
            $hospital_name = $_SESSION["hospital_name"];
            $sql = "INSERT INTO blood_info ( blood_grp, quantity, hospital) VALUES ( '$bldgrp', '$quantity', '$hospital_name')";
            if ($conn->query($sql)) {
                echo "<script>alert('Blood added successfully to your bank!');</script>";
                echo "<script>location.href = 'hospital_control.php';</script>";
            } else {
                echo "Error " . $conn->error;
            }
        } else {
            echo "<script>alert('You are not logged in!');</script>";
            echo "<script>location.href = 'login.html';</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('You are not logged in!');</script>";
        echo "<script>location.href = 'login.html';</script>";
    }
}
?>