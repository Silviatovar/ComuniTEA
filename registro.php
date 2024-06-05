<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fontawesome.com/icons/heart?f=classic&s=solid">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Graduate&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/editarPerfil.css">
    <script src="include-nav.js" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/driver.js/dist/driver.min.js"></script>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <title>Document</title>
</head>


<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <p class="fw-bold" style="font-family: pacifico; font-size: 30px;">Registro</p>
                    </div>
                    <div class="card-body">
                        <form id="registroForm" action="php/registro.php" method="POST">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    placeholder="Escribe tu nombre">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                    aria-describedby="emailHelp" placeholder="Escribe tu email">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="contraseña"
                                    placeholder="Escribe tu contraseña">
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Acepto los términos y
                                    condiciones</label>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Registrarse</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <a href="#">¿Has olvidado la contraseña?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<footer class="container-fluid bg-dark text-lefts text-light px-5 pt-2">
    <div class="text-left p-3">
        <p>Todos los Derechos reservadors &copy; 2024 | Made with by <i class="fa-regular fa-heart"></i> <span
                class="text-warning">Silvia Tovar Herrera</span></p>
    </div>
</footer>

<!-- import driverPopover.css -->
<link rel="stylesheet" href="./css/driverPopover.css">
<!-- import driver.js css -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.css" />
<script defer src="./js/registro.js"></script>
<script src="/js/tourPinicio.js"></script>
</body>

</html>