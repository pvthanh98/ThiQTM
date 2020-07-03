<?php
    include "connect.php";
    // sql to create table
    $sql = "CREATE TABLE nguoidung (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL
    )";

    if ($conn->query($sql) === TRUE) {
      echo "Table nguoidung created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }

    $conn->close();
?>