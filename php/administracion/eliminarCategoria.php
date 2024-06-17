<?php
// eliminarUsuario.php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["categoriaID"])) {
    $categoriaID = $_POST["categoriaID"];

    $servername = "mysql.webcindario.com";
    $username = "comunitea";
    $password = "comunitea";
    $dbname = "comunitea";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

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
