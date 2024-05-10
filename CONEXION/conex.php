

<?php
try {
$mysql =
"mysql:host=127.0.0.1;dbname=comunitea;charset=UTF8;port=3306";
$user = "root";
$password = "";
$conexion = new PDO($mysql, $user, $password);
echo"<p>Conectado a la BBDD</p>";
} catch (PDOException $e) {

echo "<p>" .$e->getMessage()."</p>";
}
?>
