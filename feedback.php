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
                border: 1px solid white;
                width:60%;
                height: 40%;
                border-radius: 20px;
                box-shadow: 3px 3px 5px 2px black;
            }
            body{
                margin: 0px;
                font-size: 20px;
            }
            table{
                text-align: center;
                width: auto;
            }
            input[type="submit"]{
                height:10vh;
                width: 15vh;
                background-color: lightgreen;
                border-radius: 25%;
                font-size: 15px;
                font-weight: bold;
            }
            td{
                padding: 7px 10px;
            }
            .logout{
           float: right;
            width: 20vh;
            height: 7vh;
            font-size: 17px;
            background-color: lightblue;
            border: none;
            border-radius: 25px;
        }
        .logout:hover{
            background-color: darkblue;
            color: white;
        }
        @media only screen and (max-width: 786px){
            .feedback{
                width: 100%;
                margin: 10vh 0vh;
            }
        }
    </style>
</head>
<body>
    <div id="nav-placeholder"></div>
    <form action="logout.php" >
        <button class="logout">Logout</button>
    </form>
    <form class="feedback" action="insert_feedback.php" method="post">
    <center><h1>Feedback Form</h1>
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
        </center>
    </form>
    <div id="footer-placeholder"></div>
</body>
</html>