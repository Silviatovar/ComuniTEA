<?php
session_start();
// conexGestionUsuarios.php

$servername = "mysql.webcindario.com";
$username = "comunitea";
$password = "comunitea";
$dbname = "comunitea";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM donacion";
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
