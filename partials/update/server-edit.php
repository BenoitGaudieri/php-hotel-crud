<?php
// Connect to DB
include_once __DIR__ . "/../database.php";

// room to edit
if (!empty($_GET["id"])) {
    $id_room = $_GET["id"];

    // query
    $sql = "SELECT * FROM `stanze` WHERE `id` = $id_room";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // assign the result rows to room arr
        $room = $result->fetch_assoc();
        // var_dump($room);

    } else {
        die("ID doesn't exist");
    }
} else {
    die("Error");
}

// Close connection
$conn->close();