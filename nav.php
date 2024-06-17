<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : 'invitado';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fontawesome.com/icons/heart?f=classic&s=solid">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Graduate&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/administracion.css">
    <title>Document</title>
</head>

<body>
    <header class="mt-5">
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="img/logo1.png" width="150" height="70" alt="Logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-3 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="pinicio.php">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item" data-rol="invitado">
                            <a class="nav-link active" aria-current="page" href="login.php">Accede</a>
                        </li>
                        <li class="nav-item" data-rol="invitado">
                            <a class="nav-link active" aria-current="page" href="registro.php">Registrate</a>
                        </li>
                        <li class="nav-item" data-rol="invitado" data-rol="usuario" data-rol="administrador">
                            <a class="nav-link active" aria-current="page" href="proyecto.php">APP COMUNITEA</a>
                        </li>
                        <li class="nav-item" data-rol="invitado" data-rol="usuario">
                            <a class="nav-link active" aria-current="page" href="donaciones.php">Donaciones</a>
                        </li>
                        <li class="nav-item" data-rol="usuario">
                            <a class="nav-link active" aria-current="page" href="editarPerfil.php">Editar perfil</a>
                        </li>
                        <li class="nav-item" data-rol="administrador">
                            <a class="nav-link active" aria-current="page" href="administracion.php">Administracion</a>
                        </li>
                        <li class="nav-item" data-rol="usuario">
                            <a class="nav-link active" aria-current="page" href="tickets.php">Notificaciones</a>
                        </li>
                        <li class="nav-item" data-rol="invitado" data-rol="usuario" data-rol="administrador">
                            <a class="nav-link active" aria-current="page" href="./php/logout.php">Cerrar Sesion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script>
        // Pasar la variable PHP a JavaScript
        // var rol = "<?php echo $rol; ?>";

        // // Función para ocultar las pestañas según el rol del usuario
        // function ocultarPestañasSegunRol() {
        //     // Obtener todos los elementos de lista de navegación con el atributo 'data-rol'
        //     var elementosNavegacion = document.querySelectorAll('[data-rol]');

        //     // Recorrer los elementos y ocultar aquellos que no corresponden al rol del usuario
        //     elementosNavegacion.forEach(function (elemento) {
        //         var rolElemento = elemento.getAttribute('data-rol');
        //         if (rol === 'administrador' && rolElemento !== 'administrador' && rolElemento !== 'proyecto' && rolElemento !== 'cerrar-sesion') {
        //             elemento.style.display = 'none';
        //         }
        //         else if (rol === 'usuario' && (rolElemento === 'invitado' || rolElemento === 'administrador')) {
        //             elemento.style.display = 'none';
        //         }
        //         else if (rol === 'invitado' && (rolElemento === 'usuario' || rolElemento === 'administrador')) {
        //             elemento.style.display = 'none';
        //         }
        //     });
        // }

        // Llamar a la función cuando el documento esté listo
        // document.addEventListener('DOMContentLoaded', ocultarPestañasSegunRol);
    </script>
</body>

</html>
