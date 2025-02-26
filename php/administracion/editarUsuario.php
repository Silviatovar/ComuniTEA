<?php
$servername = "mysql.webcindario.com";
$username = "comunitea";
$password = "comunitea";
$dbname = "comunitea";

$conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['usuarioID'], $_POST['nuevoNombre'], $_POST['nuevoEmail'], $_POST['nuevoRol'])) {
        $usuarioID = $_POST['usuarioID'];
        $nuevoNombre = $_POST['nuevoNombre'];
        $nuevoEmail = $_POST['nuevoEmail'];
        $nuevoRol = $_POST['nuevoRol'];

        // Preparar y ejecutar la consulta SQL
        $query = "UPDATE usuario SET nombre = ?, email = ?, rol = ? WHERE usuarioID = ?";
        $statement = $conn->prepare($query);
        $statement->bind_param("sssi", $nuevoNombre, $nuevoEmail, $nuevoRol, $usuarioID);

        if ($statement->execute()) {
            echo "Usuario actualizado correctamente";
        } else {
            echo "Error al actualizar el usuario";
        }

        $statement->close();
        $conn->close();
    } else {
        echo "Error: No se recibieron los datos esperados";
    }
?>
