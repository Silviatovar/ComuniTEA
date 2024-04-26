<?php

include 'conex.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
    $contraseña = isset($_POST["contraseña"]) ? trim($_POST["contraseña"]) : "";
    $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";

  
    if (empty($email) || empty($contraseña) || empty($nombre)) {
        echo json_encode(["status" => "error", "message" => "Por favor, complete todos los campos del formulario."]);
        exit;
    }
 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "message" => "Por favor, ingrese un correo electrónico válido."]);
        exit; 
    }

   
    if (strlen($contraseña) < 6) {
        echo json_encode(["status" => "error", "message" => "La contraseña debe tener al menos 6 caracteres."]);
        exit; 
    }

   
    $rol = "usuario";

    try {
      
        $consulta = $conexion->prepare("INSERT INTO usuarios (email, contraseña, nombre, rol) VALUES (:email, :contraseña, :nombre, :rol)");

      
        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':contraseña', $contraseña);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':rol', $rol);

       
        $consulta->execute();

      
        echo json_encode(["status" => "success", "message" => "Registro exitoso"]);

    } catch (PDOException $e) {
     
        echo json_encode(["status" => "error", "message" => "Hubo un error durante el registro: " . $e->getMessage()]);
    }

} else {
    
    echo json_encode(["status" => "error", "message" => "Error: No se han enviado datos por POST."]);
}
?>
