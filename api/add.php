<?php
session_start();
include('databaseConn.php');

$name = $_POST['name'];
$subject = $_POST['subject'];
$marks = $_POST['marks'];

$name = $conn->real_escape_string($name);
$subject = $conn->real_escape_string($subject);
$marks = $_POST['marks']; 
$sqlCheck = "SELECT * FROM students WHERE name = '$name' and subject='$subject'";
$result = $conn->query($sqlCheck);

if ($result->num_rows > 0) {
    echo '300';
    exit();
} else {
    $sqlInsert = "INSERT INTO students (`name`, `subject`, `marks`) VALUES ('$name', '$subject', '$marks')";
    if ($conn->query($sqlInsert) === TRUE) {
        echo '200';
        exit();
    } else {
        echo '400';
        exit();
    }
}

$conn->close();
?>
