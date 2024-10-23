<?php

include('databaseConn.php');

$sql = "SELECT `id`,`name`, `subject`, `marks` FROM `students` WHERE `deleted_at` IS NULL && `deleted_by` IS NULL";
$result = $conn->query($sql);



$students = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}
$conn->close();
header('Content-Type: application/json');
echo json_encode($students);

?>