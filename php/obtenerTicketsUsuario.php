<?php
session_start();
$usuarioID = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : '';
$username = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

$servername = "mysql.webcindario.com";
$username = "comunitea";
$password = "comunitea";
$dbname = "comunitea";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta para obtener los tickets del usuario actual
$query = "SELECT id_ticket, open_by, fecha_inicio, mensaje FROM tickets WHERE user_id = ?";
$statement = $conn->prepare($query);
$statement->bind_param("i", $usuarioID);
$statement->execute();
$result = $statement->get_result();

$tickets = [];
while ($row = $result->fetch_assoc()) {
    $tickets[] = $row;
}

$statement->close();
$conn->close();

$jsonData = json_encode($tickets, JSON_PRETTY_PRINT);
echo $jsonData;

?>
