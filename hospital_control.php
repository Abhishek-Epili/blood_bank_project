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
        body {
            margin: 0px;
        }

        .logout {
            float: right;
            width: 20vh;
            height: 7vh;
            font-size: 17px;
            background-color: lightblue;
            border: none;
            border-radius: 25px;
        }

        .logout:hover {
            background-color: darkblue;
            color: white;
        }

        .container {
            margin: 20px 28%;
            border: 1px solid black;
            color: black;
            height: 68.5vh;
            width: 40%;
            border-radius: 20px;
            font-family: 'Verdana';
        }
        @media only screen and (max-width: 768px){
            .container{
                margin: 10vh 0vh;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div id="nav-placeholder"></div>
    <form action="logout.php">
        <button class="logout">Logout</button>
    </form>
    <div class="container">
        <div class="content" style="text-align: center">
            <h2 style="width:90%">Welcome <?php echo $_SESSION['hospital_name'] ?>! You can select the service as you need!
            </h2><br><br><br><br>
            <a href="add_blood.html">Add blood to your bank</a><br><br><br><br>
            <a href="view_blood_requests.php">View blood requests</a>
        </div>
    </div>
    <div id="footer-placeholder"></div>
</body>

</html>