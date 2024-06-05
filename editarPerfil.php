<!-- Cursos -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.0.0/uicons-brands/css/uicons-brands.css">
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.0.0/uicons-solid-straight/css/uicons-solid-straight.css">
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.1.0/uicons-bold-rounded/css/uicons-bold-rounded.css">
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.1.0/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel="stylesheet" href="https://fontawesome.com/icons/heart?f=classic&s=solid">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script defer src="./js/generalScript.js"></script>

    <link rel="stylesheet" href="css/editarPerfil.css">
    <script src="include-nav.js" defer></script>
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- INICIO FORMULARIO DE EDICIÓN DE PERFIL -->
    <div class="container mt-5">
        <div class="row justify-content-start">
            <div class="col-12 col-lg-4 align-self-center text-muted" id="zonaUC">
                <strong>Última conexión:</strong><span class="lastConnection "></span>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center mb-4">Editar Perfil</h1>
                    <!-- Formulario de edición de perfil -->
                    <form id="updateForm" action="php/editarPerfil.php" method="POST">
                        <!-- Nombre de Usuario -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Nombre de Usuario</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="<?php echo $_SESSION['username']; ?>" placeholder="Ingrese su nombre de usuario">
                        </div>
                        <!-- Correo Electrónico -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?php echo $_SESSION['email']; ?>" placeholder="Ingrese su correo electrónico">
                        </div>
                        <!-- Nueva Contraseña -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Nueva Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Ingrese su nueva contraseña">
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN FORMULARIO DE EDICIÓN DE PERFIL -->
    <!-- Bootstrap JS y Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-pzjw8BCWJoYm7AwxwRzf3zODHO5uOV5Qbbrt8qRT5mGGZS06xjUDD1uLAgJQlDZD"
        crossorigin="anonymous"></script>
    <!-- Footer -->
    <footer class="container-fluid bg-dark text-lefts text-light px-5 pt-2">
        <div class="text-left p-3">
            <p>Todos los Derechos reservadors &copy; 2024 | Made with by <i class="fa-regular fa-heart"></i> <span
                    class="text-warning">Silvia Tovar Herrera</span></p>
        </div>
    </footer>
</body>

</html>