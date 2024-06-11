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
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $monto = $_POST["monto"];
    $mensaje = $_POST["mensaje"];

      // Validar los campos
      if (empty($nombre) || empty($email) || empty($monto) || empty($mensaje)) {
        die("Por favor, completa todos los campos.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Por favor, introduce una dirección de correo electrónico válida.");
    }

    if (!is_numeric($monto) || $monto <= 0) {
        die("Por favor, introduce un monto válido.");
    }


    // Buscar el usuario por correo electrónico
    $sql_buscar_usuario = "SELECT usuarioID FROM usuario WHERE email = ?";
    $stmt_buscar_usuario = $conn->prepare($sql_buscar_usuario);

    if (!$stmt_buscar_usuario) {
        die("Error al preparar la consulta de búsqueda de usuario: " . $conn->error);
    }

    $stmt_buscar_usuario->bind_param("s", $email);
    $stmt_buscar_usuario->execute();
    $stmt_buscar_usuario->store_result();

    if ($stmt_buscar_usuario->num_rows > 0) {
        // El usuario existe, obtener su usuarioID
        $stmt_buscar_usuario->bind_result($usuarioID);
        $stmt_buscar_usuario->fetch();
        
        // Redirigir a la página de inicio sin cerrar la sesión
        header("Location: ../pinicio.php");
        exit();
    } else {
        // El usuario no existe, usar el usuarioID predeterminado (0)
        $usuarioID = null; // Usuario por defecto
    }

    $stmt_buscar_usuario->close();

    // Insertar la donación con el usuarioID
    $sql_insertar_donacion = "INSERT INTO donacion (usuarioID, nombre, email, monto, mensaje, fecha) VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt_insertar_donacion = $conn->prepare($sql_insertar_donacion);

    if (!$stmt_insertar_donacion) {
        die("Error al preparar la consulta de inserción de donación: " . $conn->error);
    }

    $stmt_insertar_donacion->bind_param("issds", $usuarioID, $nombre, $email, $monto, $mensaje);

    if (!$stmt_insertar_donacion->execute()) {
        die("Error al ejecutar la consulta de inserción de donación: " . $stmt_insertar_donacion->error);
    }

    $stmt_insertar_donacion->close();

    // Redirigir a la página de inicio
    
    header("Location: ../pinicio.php");
    
} else {
    echo "Error al enviar el formulario";
   
}
 exit();
$conn->close();
?>
