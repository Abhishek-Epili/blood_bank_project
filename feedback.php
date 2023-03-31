<?php
error_reporting(0);

session_start();
try {
    if ($_SESSION["hospital_log"] == "yes" || $_SESSION["receiver_log"] == "yes") {
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
        .feedback{
                margin: 30px 20%;
                border: 1px solid black;
                width: 800px;
                height: 450px;
                border-radius: 25%;
            }
            body{
                margin: 0px;
                font-size: 20px;
            }
            table{
                text-align: center;
                width: 500px;
                margin-left: 150px;
            }
            input[type="submit"]{
                height:50px;
                width: 100px;
                background-color: lightgreen;
                border-radius: 25%;
                font-size: 15px;
                font-weight: bold;
            }
            td{
                padding: 7px 10px;
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
    </style>
</head>
<body>
    <div id="nav-placeholder"></div>
    <form class="feedback" action="insert_feedback.php" method="post">
        <h1><center>Feedback Form</center></h1>
        <table >
            <tr>
                <td colspan="3" style="font-weight: bold">How would you rate our services.</td>
            </tr>
            <tr>     
        <td>Good<input type="radio" name="service" value="Good" required></td>
        <td>Average<input type="radio" name="service" value="Average" required></td>
        <td>Bad<input type="radio" name="service" value="Bad" required></td>
            </tr> 
            <tr>
                <td colspan="3" style="font-weight: bold">How would you rate our webiste.</td>
            </tr>
            <tr>     
        <td>Good<input type="radio" name="website" value="Good"required ></td>
        <td>Average<input type="radio" name="website" value="Average" required></td>
        <td>Bad<input type="radio" name="website" value="Bad" required></td>
            </tr> 
            <tr>
                <td colspan="3" style="font-weight: bold">Any suggestions if you wanna give.</td>
            </tr>
            <tr>     
                <td colspan="3" style="width:300px"><input type="text" name="suggestions" style="width: 100%; height:50px" maxlength="254" required></td>
            </tr>
            <tr>     
        <td colspan="3"><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
    <form action="logout.php" >
        <button class="logout">Logout</button>
    </form>
</body>
</html>