<?php
// Connect to db
include_once __DIR__ . "/../database.php";

include_once __DIR__ . "/../functions.php";

// Check if there is a room ID
if (empty($_POST["id"])) {
    die("error");
}

$id_room = $_POST["id"];
$url = "$base_path?del=$id_room";

removeById($conn, "stanze", $id_room, $url);

// Query
// $sql = "DELETE FROM `stanze` WHERE `id` = $id_room";
// $result = $conn->query($sql);

// if ($result && $conn->affected_rows > 0) {
//     header("Location: $base_path?del=$id_room");
// } elseif ($result) {
//     echo "Room not found";
// } else {
//     echo "Error";
// }

// $conn->close();