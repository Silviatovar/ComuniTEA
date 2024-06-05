<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comunitea";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql_usuario = "
    CREATE TABLE IF NOT EXISTS usuario (
        usuarioID INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        contraseña VARCHAR(255) NOT NULL,
        rol ENUM('usuario','administrador') NOT NULL,
        PRIMARY KEY (usuarioID),
        UNIQUE KEY email (email)
    );
";

if ($conn->query($sql_usuario) === TRUE) {
    echo "Tabla 'usuario' creada correctamente.<br>";
} else {
    echo "Error al crear tabla 'usuario': " . $conn->error . "<br>";
}

$sql_categoria = "
CREATE TABLE IF NOT EXISTS categoria (
    categoriaID INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    usuarioID INT,
    PRIMARY KEY (categoriaID),
    CONSTRAINT usuario_fk_1 FOREIGN KEY (usuarioID) REFERENCES usuario(usuarioID) ON DELETE CASCADE
);
";

if ($conn->query($sql_categoria) === TRUE) {
    echo "Tabla 'categoria' creada correctamente.<br>";
} else {
    echo "Error al crear tabla 'categoria': " . $conn->error . "<br>";
}

$sql_pictograma = "
    CREATE TABLE IF NOT EXISTS pictograma (
        pictogramaID INT NOT NULL AUTO_INCREMENT,
        imagenURL VARCHAR(255) NOT NULL,
        nombre VARCHAR(255) NOT NULL,
        audioURL VARCHAR(255),
        categoriaID INT,
        PRIMARY KEY (pictogramaID),
        KEY categoriaID (categoriaID),
        CONSTRAINT pictograma_fk_1 FOREIGN KEY (categoriaID) REFERENCES categoria(categoriaID) ON DELETE SET NULL
    );
";

if ($conn->query($sql_pictograma) === TRUE) {
    echo "Tabla 'pictograma' creada correctamente.<br>";
} else {
    echo "Error al crear tabla 'pictograma': " . $conn->error . "<br>";
}

$sql_donacion = "
    CREATE TABLE IF NOT EXISTS donacion (
        donacionID INT NOT NULL AUTO_INCREMENT,
        usuarioID INT,
        nombre VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        monto DECIMAL(10,2) NOT NULL,
        fecha DATE NOT NULL,
        mensaje VARCHAR(255) NOT NULL,
        PRIMARY KEY (donacionID),
        KEY usuarioID (usuarioID),
        CONSTRAINT donacion_fk_1 FOREIGN KEY (usuarioID) REFERENCES usuario(usuarioID) ON DELETE CASCADE
    );
";

if ($conn->query($sql_donacion) === TRUE) {
    echo "Tabla 'donacion' creada correctamente.<br>";
} else {
    echo "Error al crear tabla 'donacion': " . $conn->error . "<br>";
}

$sql_tickets = "
    CREATE TABLE IF NOT EXISTS tickets (
        id_ticket INT NOT NULL AUTO_INCREMENT,
        user_id INT NOT NULL,
        open_by VARCHAR(255) NOT NULL,
        fecha_inicio DATETIME NOT NULL,
        mensaje VARCHAR(255) NOT NULL,
        status VARCHAR(50) NOT NULL,
        PRIMARY KEY (id_ticket),
        KEY user_id (user_id),
        CONSTRAINT tickets_fk_1 FOREIGN KEY (user_id) REFERENCES usuario(usuarioID) ON DELETE CASCADE
    );
";

if ($conn->query($sql_tickets) === TRUE) {
    echo "Tabla 'tickets' creada correctamente.<br>";
} else {
    echo "Error al crear tabla 'tickets': " . $conn->error . "<br>";
}

$conn->close();
?>
