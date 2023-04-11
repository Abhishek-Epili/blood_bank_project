<!DOCTYPE html>
<html>

<head>
    <title>Request Blood Sample</title>
    <style>
        body{
            margin: 0px;
        }
        table{
            width: auto;
        }
        td{
            font-size: 20px;
            padding: 10px 40px;
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
        .btn{
            width: 30%;
            height: 10vh;
            font-size: 15px;
            background-color: lightblue;
            border: none;
        }
        .btn:hover{
            background-color: darkblue;
            color: white;
        }
        
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="navbar.js"></script>
</head>

<body>
    <div id="nav-placeholder"></div>
    <?php
    session_start();
    try {
        if ($_SESSION["receiver_log"] == "yes") {
            $conn = new mysqli("localhost", "id20534660_root", "Blood_bank_123", "id20534660_blood_bank");
            if ($conn->connect_error) {
                die("Unable to Connect database: " . $conn->connect_error);
            } else {

                $id = $_GET["id"];
                $sql = "select * from blood_info where id='" . $id . "'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                }
                $quantity_str = $row["quantity"];
                $quantity = str_replace("ml", "Blood_bank_123", $quantity_str);
            }
        } else {
            echo "<script>alert('You are not logged in!');</script>";
            echo "<script>location.href = 'login.html';</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('You are not logged in!');</script>";
        echo "<script>location.href = 'login.html';</script>";
    }
    ?>
    <form action="logout.php" >
        <button class="logout">Logout</button>
    </form>
    <form action="add_request.php?id=<?php echo $id ?>" method="post">
        
            <br><br>
                <h2 style="width: 600px; margin-left:25%"><?php echo "According to your request, " . $row["quantity"] . " of " . $row["blood_grp"] . " blood is present in " . $row["hospital"]; ?></h1>
                <br><br>
                <table>
            <tr>
                <td>Please enter quantity of blood you need(in ml)</td>
                <td><input type="number" name="quantity" required max="<?php echo intval($quantity) ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input class="btn" type="submit" value="Make a request"></td>
            </tr>
        </table>
    </form>
    <div id="footer-placeholder"></div>
</body>

</html>