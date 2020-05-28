<?php
include_once __DIR__ . "/../database.php";

// get link ID
$data = $_GET;

// get room ID
$id_room = $data[id];

// Query selected room
$sql = "SELECT * FROM `stanze` WHERE `id` = $id_room";
$result = $conn->query($sql);
// var_dump($result);

if ($conn & $result->num_rows > 0) {
    $room = $result->fetch_assoc();
    // var_dump($room);
} elseif ($result) {
    echo "no room";
} else {
    echo "query error";
}

// close connection
$conn->close();