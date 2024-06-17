<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar que el usuario esté autenticado y obtener su ID
    if (!isset($_SESSION['usuario_id'])) {
        echo json_encode(['success' => false, 'error' => 'Usuario no autenticado']);
        exit;
    }
    
    $usuarioID = $_SESSION['usuario_id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Conexión a la base de datos
    $servername = "mysql.webcindario.com";
    $username = "comunitea";
    $password = "comunitea";
    $dbname = "comunitea";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        echo json_encode(['success' => false, 'error' => 'Conexión fallida: ' . $conn->connect_error]);
        exit;
    }

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("INSERT INTO categoria (usuarioID, nombre, descripcion) VALUES (?, ?, ?)");
    if ($stmt === false) {
        echo json_encode(['success' => false, 'error' => 'Preparación de la consulta fallida: ' . $conn->error]);
        $conn->close();
        exit;
    }

    $stmt->bind_param("iss", $usuarioID, $nombre, $descripcion);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Método no permitido']);
}
?>
