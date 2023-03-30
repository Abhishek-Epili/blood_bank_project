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
        .container {
            margin: 20px 28%;
            border: 1px solid black;
            color: black;
            height: 480px;
            width: 600px;
            border-radius: 20px;
            font-family: 'Verdana';
        }
        .content {
            position: relative;
            left: 50px;
        }
        .link{
            margin-left: 130px;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div id="nav-placeholder"></div>
    <div class="container">
        <div class="content">
    <h1 style="width:500px">Welcome <?php ?>! You can select the service as you need!</h1><br><br><br><br>
    <a href="add_blood.html" class="link">Add blood to your bank</a><br><br><br><br>
    <a href="view_blood_requests.php" class="link">View blood requests</a>
    </div>
    </div>
    <form action="logout.php" >
        <button class="logout">Logout</button>
    </form>
</body>
</html>