<?php
$conn = new mysqli("localhost", "id20534660_root", "Blood_bank_123", "id20534660_blood_bank");
if ($conn->connect_error) {
    die("Unable to Connect database: " . $conn->connect_error);
} else {
    session_start();
    try {
        if ($_SESSION["receiver_log"] == "yes") {
            $id = $_GET["id"];
            $sql = "select * from blood_info where id=" . $id;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                if ($row = $result->fetch_assoc()) {
                    $name = $_SESSION["receiver_name"];
                    $quantity = $_POST["quantity"] . "ml";
                    $sql = "INSERT INTO blood_requests ( requester, blood_type, blood_quantity, hospital) VALUES ( '$name', '" . $row["blood_grp"] . "', '$quantity', '" . $row["hospital"] . "');";
                    if ($conn->query($sql)) {
                        echo "<script>alert('Request added!');</script>";
                        echo "<script>location.href = 'view_blood_sample.php?user=receiver';</script>";
                    }
                }
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