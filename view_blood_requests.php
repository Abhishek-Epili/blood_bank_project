
<?php 
session_start();
try {
    if ($_SESSION["hospital_log"] == "yes") {
    } else {
        echo "<script>alert('You are not logged in!');</script>";
        echo "<script>location.href = 'login.html';</script>";
    }
} catch (Exception $e) {
    echo "<script>alert('You are not logged in!');</script>";
    echo "<script>location.href = 'login.html';</script>";
}
?>
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
            margin: 50px 30%;
        }
        table,th,td{
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            font-size: 20px;
        }
        table{
            width: 500px;
            height: 50px;
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
    try {
        if ($_SESSION["hospital_log"] == "yes") {
            $name = $_SESSION["hospital_name"];
            $sql = "select * from blood_requests where hospital = '" . $name . "'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $table = "<table><tr><th>Id</th><th>Requester</th><th>Blood Type</th><th>Blood Quantity</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    $table .= "<tr><td>" . $row["id"] . "</td><td>" . $row["requester"] . "</td><td>" . $row["blood_type"] . "</td><td>" . $row["blood_quantity"] . "</td></tr>";
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
?>
    <div class="content">
    <h1 style="width: 500px; text-align: center">Details of people requested for blood are as follows</h1><br><br>
    <?php
    echo $table;
    ?>
    </div>
    <form action="logout.php" >
        <button class="logout">Logout</button>
    </form>

</body>
</html>