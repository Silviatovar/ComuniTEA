<?php
// Conexión a la base de datos
$servername = "127.0.0.1";
$database = "comunitea";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ticketID = isset($_GET['ticket_id']) ? $_GET['ticket_id'] : '';

if ($ticketID) {
    $query = "SELECT mensaje, fecha, open_by AS enviado_por
              FROM tickets
              WHERE id_ticket = ?
              ORDER BY fecha ASC";
    $statement = $conn->prepare($query);
    $statement->bind_param("i", $ticketID);

    if ($statement->execute()) {
        $result = $statement->get_result();
        $mensajes = array();

        while ($row = $result->fetch_assoc()) {
            $mensajes[] = $row;
        }

        echo json_encode($mensajes);
    } else {
        echo json_encode([]);
    }

    $statement->close();
}

$conn->close();
?>
