<?php

include('databaseConn.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    $sql = "UPDATE `students` SET `deleted_by`='1',`deleted_at`= now() WHERE `id` = $id";
   $result = $conn->query($sql) ;
    if ($conn->query($sql) === TRUE) {
         echo '200';
        exit();
    } else {
        echo '400';
        exit();
    }

 
    $stmt->close();
}


$conn->close();

?>
