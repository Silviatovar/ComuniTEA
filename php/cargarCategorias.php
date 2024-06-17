<?php
session_start();

// Conexión a la base de datos
$servername = "mysql.webcindario.com";
$username = "comunitea";
$password = "comunitea";
$dbname = "comunitea";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verifica si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(array("error" => "Usuario no logueado"));
    $conn->close();
    exit();
}

// Obtén el ID del usuario logueado desde la sesión
$usuarioID = $_SESSION['usuario_id'];

// Selecciona solo las categorías que pertenecen al usuario logueado
$sql = "SELECT * FROM categoria WHERE usuarioID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuarioID);
$stmt->execute();
$result = $stmt->get_result();

$categorias = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }
}


echo json_encode($categorias);

$stmt->close();
$conn->close();
?>
