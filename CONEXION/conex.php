

<?php
try {
$mysql =
"mysql.webcindario.com;dbname=comunitea;charset=UTF8;port=3306";
$user = "comunitea";
$password = "comunitea";
$conexion = new PDO($mysql, $user, $password);
echo"<p>Conectado a la BBDD</p>";
} catch (PDOException $e) {

echo "<p>" .$e->getMessage()."</p>";
}
?>
