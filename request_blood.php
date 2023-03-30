<!DOCTYPE html>
<html>

<head>
    <title>Request Blood Sample</title>
</head>

<body>
    <?php
    session_start();
    try {
        if ($_SESSION["receiver_log"] == "yes") {
            $conn = new mysqli("localhost", "root", "", "blood_bank", 3307);
            if ($conn->connect_error) {
                die("Unable to Connect database: " . $conn->connect_error);
            } else {

                $id = $_GET["id"];
                $sql = "select * from blood_info where id='" . $id . "'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    if ($row = $result->fetch_assoc()) {
                        echo "According to your request, " . $row["quantity"] . " of " . $row["blood_grp"] . " blood is present in " . $row["hospital"];
                    }
                }
                $quantity_str = $row["quantity"];
                $quantity = str_replace("ml", "", $quantity_str);
            }
        } else {
            echo "<script>alert('You are not logged in!');</script>";
            echo "<script>location.href = 'index.html';</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('You are not logged in!');</script>";
        echo "<script>location.href = 'index.html';</script>";
    }
    ?>
    <form action="add_request.php?id=<?php echo $id ?>" method="post">
        <table>
            <tr>
                <td>Please enter quantity of blood you need(in ml)</td>
                <td><input type="number" name="quantity" required max="<?php echo intval($quantity) ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Make a request"></td>
            </tr>
        </table>
    </form>
</body>

</html>