<?php
// eliminarUsuario.php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["categoriaID"])) {
    $categoriaID = $_POST["categoriaID"];

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
    $sql = "DELETE FROM categoria WHERE categoriaID = $categoriaID";

    if ($conn->query($sql) === TRUE) {
        echo "Categoria eliminada exitosamente";
    } else {
        echo "Error al eliminar la categoria: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Error: Datos de categoria no proporcionados";
}
?>
