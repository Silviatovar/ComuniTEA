<?php
// eliminarUsuario.php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["pictogramaID"])) {
    $pictogramaID = $_POST["pictogramaID"];

    $servername = "mysql.webcindario.com";
    $username = "comunitea";
    $password = "comunitea";
    $dbname = "comunitea";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Consulta SQL para eliminar el usuario
    $sql = "DELETE FROM pictograma WHERE pictogramaID = $pictogramaID";

    if ($conn->query($sql) === TRUE) {
        echo "Pictograma eliminado exitosamente";
    } else {
        echo "Error al eliminar pictograma: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Error: Datos de usuario no proporcionados";
}
?>
