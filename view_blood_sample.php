<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="navbar.js"></script>
    <style>
        body{
            margin:0px;
        }
        .logout{
            position:absolute;
            top: 100px;
            right:40px;
            width: 120px;
            height: 60px;
            font-size: 17px;
            background-color: lightblue;
            border: none;
            border-radius: 25px;
        }
        .logout:hover{
            background-color: darkblue;
            color: white;
        }
        .content{
            margin: 50px 25%;
        }
        table,th,td{
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            font-size: 20px;
        }
        table{
            width: 600px;
            height: 60px;
        }
    </style>
</head>
<body>
<div id="nav-placeholder"></div>
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
<div class="content">
    <h1 style="width: 600px; text-align: center">Details of blood samples available in particular hospitals are as follows</h1><br><br>
    <?php
    echo $table;
    echo "</div";
    if($_GET["user"] == "view"){
    echo "</div>
    <form action='logout.php' >
        <button class='logout'>Logout</button>
    </form>";
    }
    ?>
    

</body>
</html>