<?php
session_start();
$host = "localhost";
$dbname = "comunitea";
$user = "root";
$password = "";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $audio = $_POST['audio'];
    $nombre = $_POST['nombre'];
    $imagen = $_POST['imagen'];
    $categoriaID = $_POST['categoriaID'];

    try {
        $sql = "INSERT INTO pictograma (nombre, audioURL, imagenURL,categoriaID ,usuarioID ) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $nombre, $audio, $imagen,$categoriaID ,$_SESSION['usuario_id']); 

        if ($stmt->execute()) {
            echo "Registro exitoso";
        } else {
            echo "Error en el registro: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } catch (mysqli_sql_exception $e) {
        die("Error en la consulta: " . $e->getMessage());
    }
}
?>
