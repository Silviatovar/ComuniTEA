<?php
// conexGestionUsuarios.php

$servername = "127.0.0.1";
$database = "comunitea";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM categoria";
$result = $conn->query($sql);

$categoria = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categoria[] = $row;
    }
}

echo json_encode($categoria);


$conn->close();
?>
