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
// $sql = "UPDATE `stanze`
// SET `room_number` = $room_number, `beds` = $beds, `floor` = $floor
// WHERE `id` = $id_room";
// $result = $conn->query($sql);

// if ($result && $conn->affected_rows > 0) {
//     header("Location: $base_path/show.php?id=$id_room");
// } elseif ($result) {
//     die("No room found");
// } else {
//     die("Error");
// }

// Update with prepare statements
$sql = "UPDATE `stanze`
SET `room_number` = ?, `beds` = ?, `floor` = ?, `updated_at` = NOW()
WHERE `id` = ?";

// prepare() correctly "escape" params so SQL Injection cannot occur
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiii", $room_number, $beds, $floor, $id_room);
$stmt->execute();

if ($stmt && $stmt->affected_rows > 0) {
    header("Location: $base_path" . "show.php?id=$id_room");
} elseif ($stmt) {
    die("No room found");
} else {
    die("Error");
}

// Close connection
$conn->close();