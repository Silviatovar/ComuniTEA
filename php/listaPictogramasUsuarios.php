<?php
session_start();
$servername = "127.0.0.1";
$database = "comunitea";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$id = $_SESSION['usuario_id'];
$sql = "SELECT * FROM pictograma WHERE usuarioID = {$id}";
$result = $conn->query($sql);

$pictogramas = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pictogramas[] = $row;
    }
}

echo json_encode($pictogramas);


$conn->close();
?>
