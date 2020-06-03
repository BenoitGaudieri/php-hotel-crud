<?php

// GET ALL RECORDS FROM A DB TABLE
function getAll($conn, $table){
    $sql = "SELECT * FROM `$table` ";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $records = [];
        while ($row = $result->fetch_assoc()) {
            // var_dump($row);
            // echo "ID: {$row['id']} - Floor: {$row['floor']} <br>";

            // populate array rooms with db results
            $records[] = $row;
        }
    } elseif ($result) {
        $records = [];
    } else {
        $records = false;
    }

    // Close the connection to db
    $conn->close();

    return $records;
};

// GET SINGLE RECORD BY ID
function getById($conn, $table, $id) {
    $sql = "SELECT * FROM `$table` WHERE `id` = $id";
    $result = $conn->query($sql);
    // var_dump($result);

    if ($conn & $result->num_rows > 0) {
        $record = $result->fetch_assoc();
        // var_dump($room);
    } elseif ($result) {
        return $record = [];
    } else {
        return false;
    }

    // close connection
    $conn->close();

    return $record;
};

// DELETE RECORD BY ID
function removeById($conn, $table, $id, $url){
    $sql = "DELETE FROM `$table` WHERE `id` = $id";
    $result = $conn->query($sql);

    if ($result && $conn->affected_rows > 0) {
        header("Location: $url");
    } elseif ($result) {
        echo "Room not found";
    } else {
        echo "Error";
    }

    $conn->close();
};