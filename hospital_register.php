<?php 
$conn = new mysqli("localhost","id20534660_root","Blood_bank_123","id20534660_blood_bank",3307);
if ($conn->connect_error) { 
    die("Unable to Connect database: " . $conn->connect_error);
}
else{
    if ($_POST["pass1"] == $_POST["pass2"]) {
    $name = $_POST["name"];
    $contact= $_POST["contact"];
    $email= $_POST["email"];
    $address= $_POST["address"];
    $pass= $_POST["pass1"];
    $sql = "insert into hospital_data ( name, contact, email, address, pass) values ( '$name', '$contact', '$email', '$address', '$pass')";
    if($conn->query($sql)==TRUE){
        echo "<script>alert('Registered Successfully!');</script>";
        echo "<script>location.replace('login.html');</script>";
    }
    else {
        echo "Error: " . $conn->error;
    }
}
else{
    echo "<script>alert('Passwords are not same!');</script>";
        echo "<script>location.replace('hospital_register.html');</script>";
}
}
?>