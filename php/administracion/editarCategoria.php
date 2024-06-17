<?php
    // Conexión a la base de datos
    $servername = "mysql.webcindario.com";
    $username = "comunitea";
    $password = "comunitea";
    $dbname = "comunitea";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['categoriaID'], $_POST['nuevoNombre'], $_POST['nuevaDescripcion'])) {
        $categoriaID = $_POST['categoriaID'];
        $nuevoNombre = $_POST['nuevoNombre'];
        $nuevaDescripcion = $_POST['nuevaDescripcion'];

        // Preparar y ejecutar la consulta SQL
        $query = "UPDATE categoria SET nombre = ?, descripcion = ? WHERE categoriaID = ?";
        $statement = $conn->prepare($query);
        $statement->bind_param("ssi", $nuevoNombre, $nuevaDescripcion, $categoriaID);

        if ($statement->execute()) {
            echo "Categoria actualizado correctamente";
        } else {
            echo "Error al actualizar el categoria: " . $statement->error;
        }

        $statement->close();
        $conn->close();
    } else {
        echo "Error: No se recibieron los datos esperados";
    }
?>
