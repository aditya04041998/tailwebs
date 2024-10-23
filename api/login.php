<?php
session_start(); 

include('databaseConn.php');

$userId = $_POST['userid'];
$passwordInput = $_POST['password'];

$sql = "SELECT * FROM users WHERE user_id = '$userId'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
   $fetchedPassword = $row['password'];
    if ($passwordInput == $fetchedPassword) {
        $_SESSION['userid'] = $userId;
        echo "200";
        exit();
    } else {
        echo "400";
        exit();
    }
} else {
    echo "400";
    exit();
}

$conn->close();
?>
