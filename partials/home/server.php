<?php
include_once __DIR__ . "/../database.php";

// list
$sql = "SELECT * FROM `stanze` ";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $rooms = [];
    while ($row = $result->fetch_assoc()) {
        // var_dump($row);
        // echo "ID: {$row['id']} - Floor: {$row['floor']} <br>";

        // populate array rooms with db results
        $rooms[] = $row;
    }
} elseif ($result) {
    echo "No results";
} else {
    echo ("Query error");
}

// Close the connection to db
$conn->close();