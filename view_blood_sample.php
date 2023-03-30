<?php
$conn = new mysqli("localhost", "root", "", "blood_bank", 3307);
if ($conn->connect_error) {
    die("Unable to Connect database: " . $conn->connect_error);
} else {
    session_start();
    if ($_GET["user"] == "view") {
        $sql = "select * from blood_info";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $table = "<table border='1'><tr><th>Id</th><th>Blood Group</th><th>Blood Quantity</th><th>Available in Hospital</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $table .= "<tr><td>" . $row["id"] . "</td><td>" . $row["blood_grp"] . "</td><td>" . $row["quantity"] . "</td><td>" . $row["hospital"] . "</td></tr>";
            }
            $table .= "</table>";
            echo $table;
        } else {
            echo "Error " . $conn->error;
        }
    } else {
        try {
            if ($_SESSION["receiver_log"] == "yes") {
                $bldgrp = $_SESSION["receiver_bldgrp"];
                $sql = "select * from blood_info where blood_grp='" . $bldgrp . "'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $table = "<table border='1'><tr><th>Id</th><th>Blood Group</th><th>Blood Quantity</th><th>Available in Hospital</th><th>Request</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        $table .= "<tr><td>" . $row["id"] . "</td><td>" . $row["blood_grp"] . "</td><td>" . $row["quantity"] . "</td><td>" . $row["hospital"] . "</td><td><a href='request_blood.php?id=" . $row["id"] . "'>Request Sample</a></td></tr>";
                    }
                    $table .= "</table>";
                    echo $table;
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

}
?>