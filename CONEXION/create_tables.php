<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comunitea";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Sentencias SQL para crear la tabla usuario
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

// Ejecutar la sentencia SQL para crear la tabla usuario
if ($conn->query($sql_usuario) === TRUE) {
    echo "Tabla 'usuario' creada correctamente.<br>";
} else {
    echo "Error al crear tabla 'usuario': " . $conn->error . "<br>";
}

// Sentencias SQL para crear la tabla categoria
$sql_categoria = "
    CREATE TABLE IF NOT EXISTS categoria (
        categoriaID INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(255) NOT NULL,
        descripcion TEXT,
        PRIMARY KEY (categoriaID)
    );
";

// Ejecutar la sentencia SQL para crear la tabla categoria
if ($conn->query($sql_categoria) === TRUE) {
    echo "Tabla 'categoria' creada correctamente.<br>";
} else {
    echo "Error al crear tabla 'categoria': " . $conn->error . "<br>";
}

// Sentencias SQL para crear la tabla pictograma
$sql_pictograma = "
    CREATE TABLE IF NOT EXISTS pictograma (
        pictogramaID INT NOT NULL AUTO_INCREMENT,
        imagenURL VARCHAR(255) NOT NULL,
        etiqueta VARCHAR(255) NOT NULL,
        audioURL VARCHAR(255),
        categoriaID INT,
        PRIMARY KEY (pictogramaID),
        KEY categoriaID (categoriaID),
        CONSTRAINT pictograma_fk_1 FOREIGN KEY (categoriaID) REFERENCES categoria(categoriaID) ON DELETE SET NULL
    );
";

// Ejecutar la sentencia SQL para crear la tabla pictograma
if ($conn->query($sql_pictograma) === TRUE) {
    echo "Tabla 'pictograma' creada correctamente.<br>";
} else {
    echo "Error al crear tabla 'pictograma': " . $conn->error . "<br>";
}


// Sentencias SQL para crear la tabla secuencia
$sql_secuencia = "
    CREATE TABLE IF NOT EXISTS secuencia (
        secuenciaID INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(255) NOT NULL,
        usuarioID INT,
        PRIMARY KEY (secuenciaID),
        KEY usuarioID (usuarioID),
        CONSTRAINT secuencia_fk_1 FOREIGN KEY (usuarioID) REFERENCES usuario(usuarioID) ON DELETE CASCADE
    );
";

// Ejecutar la sentencia SQL para crear la tabla secuencia
if ($conn->query($sql_secuencia) === TRUE) {
    echo "Tabla 'secuencia' creada correctamente.<br>";
} else {
    echo "Error al crear tabla 'secuencia': " . $conn->error . "<br>";
}

// Sentencias SQL para crear la tabla pictograma_secuencia
$sql_pictograma_secuencia = "
    CREATE TABLE IF NOT EXISTS pictograma_secuencia (
        pictogramaID INT NOT NULL,
        secuenciaID INT NOT NULL,
        orden INT NOT NULL,
        PRIMARY KEY (pictogramaID, secuenciaID),
        KEY secuenciaID (secuenciaID),
        CONSTRAINT pictograma_secuencia_fk_1 FOREIGN KEY (pictogramaID) REFERENCES pictograma(pictogramaID) ON DELETE CASCADE,
        CONSTRAINT pictograma_secuencia_fk_2 FOREIGN KEY (secuenciaID) REFERENCES secuencia(secuenciaID) ON DELETE CASCADE
    );
";

// Ejecutar la sentencia SQL para crear la tabla pictograma_secuencia
if ($conn->query($sql_pictograma_secuencia) === TRUE) {
    echo "Tabla 'pictograma_secuencia' creada correctamente.<br>";
} else {
    echo "Error al crear tabla 'pictograma_secuencia': " . $conn->error . "<br>";
}


// Sentencias SQL para crear la tabla donacion
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

// Ejecutar la sentencia SQL para crear la tabla donacion
if ($conn->query($sql_donacion) === TRUE) {
    echo "Tabla 'donacion' creada correctamente.<br>";
} else {
    echo "Error al crear tabla 'donacion': " . $conn->error . "<br>";
}

// Cerrar conexión
$conn->close();
?>
