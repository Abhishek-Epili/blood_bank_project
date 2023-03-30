<?php
$conn = new mysqli("localhost", "root", "", "blood_bank", 3307);
if ($conn->connect_error) {
    die("Unable to Connect database: " . $conn->connect_error);
} else {
    session_start();
    try {
        if ($_SESSION["receiver_log"] == "yes") {
            $name = $_SESSION["hospital_name"];
            $sql = "select * from blood_requests where hospital = '" . $name . "'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $table = "<table border='1'><tr><th>Id</th><th>Requester</th><th>Blood Type</th><th>Blood Quantity</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    $table .= "<tr><td>" . $row["id"] . "</td><td>" . $row["requester"] . "</td><td>" . $row["blood_type"] . "</td><td>" . $row["blood_quantity"] . "</td></tr>";
                }
                $table .= "</table>";
                echo $table;
            } else {
                echo "Error " . $conn->error;
            }
        } else {
            echo "<script>alert('You are not logged in!');</script>";
            echo "<script>location.href = 'index.html';</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('You are not logged in!');</script>";
        echo "<script>location.href = 'login.html';</script>";
    }
}
?>