<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    // Redirigir al usuario a la página de inicio de sesión si no está autenticado
    header("Location: login.php");
    exit;
}

// Obtener el usuarioID del usuario autenticado
$usuarioID = $_SESSION['usuario_id'];

// Conexión a la base de datos
$host = "localhost";
$dbname = "comunitea";
$user = "root";
$password = "";

$conn = new mysqli($host, $user, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar las categorías del usuario desde la base de datos
$sql = "SELECT nombre, descripcion FROM categoria WHERE usuarioID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuarioID);
$stmt->execute();
$result = $stmt->get_result();

// Generar HTML para mostrar las categorías
$categorias_html = '';
while ($row = $result->fetch_assoc()) {
    $categoriaNombre = htmlspecialchars($row['nombre']);
    $categoriaDescripcion = htmlspecialchars($row['descripcion']);
    $categorias_html .= "<div>";
    $categorias_html .= "<h3>$categoriaNombre</h3>";
    $categorias_html .= "<p>$categoriaDescripcion</p>";
    $categorias_html .= "</div>";
}

$stmt->close();
$conn->close();
?>

