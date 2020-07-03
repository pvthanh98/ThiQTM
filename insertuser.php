<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert USER</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    include "menu.php";
    if(isset($_POST["submit"])){
        include "connect.php";
        $sql = "INSERT INTO nguoidung (fullname, email)
        VALUES ('".$_POST["fullname"]."','".$_POST["email"]."')";

        if ($conn->query($sql) === TRUE) {
            echo "Created ".$_POST["fullname"]. " successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else { ?>
    <h3>Thêm User</h3>
    <form method="POST">
        <input type="text" name="fullname" placeholder="type your name">
        <input type="text" name="email" placeholder ="type your email">
        <input type="submit" name="submit">
    </form>
<?php  } ?>
</body>
</html>