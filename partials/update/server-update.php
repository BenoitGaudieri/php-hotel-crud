<?php
// Connect to DB
include_once __DIR__ . "/../database.php";

// check id
if (empty($_POST["id"])) {
    die("ID doesn't exist");
}

$id_room = $_POST["id"];
$room_number = $_POST["room_number"];
$beds = $_POST["beds"];
$floor = $_POST["floor"];

// perform update
$sql = "UPDATE `stanze`
SET `room_number` = $room_number, `beds` = $beds, `floor` = $floor
WHERE `id` = $id_room";

$result = $conn->query($sql);

if ($result && $conn->affected_rows > 0) {
    header("Location: $base_path/show.php?id=$id_room");
} elseif ($result) {
    die("No room found");
} else {
    die("Error");
}

// Close connection
$conn->close();