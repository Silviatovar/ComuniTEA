<?php
// eliminarUsuario.php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["donacionID"])) {
    $donacionID = $_POST["donacionID"];

    // Conexión a la base de datos
    $servername = "127.0.0.1";
    $database = "comunitea";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Consulta SQL para eliminar el usuario
    $sql = "DELETE FROM donacion WHERE donacionID = $donacionID";

    if ($conn->query($sql) === TRUE) {
        echo "donacion cancelada exitosamente";
    } else {
        echo "Error al cancelar la donacion: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Error: Datos de usuario no proporcionados";
}
?>
