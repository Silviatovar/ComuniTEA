<!DOCTYPE html>
<html lang="es">
<?php
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<head>
    <meta charset="UTF-8">
    <?php include 'nav.php'; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fontawesome.com/icons/heart?f=classic&s=solid">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Graduate&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos_generales.css">
    <script src="https://cdn.jsdelivr.net/npm/driver.js/dist/driver.min.js"></script>
    <title>Registro</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <p class="fw-bold" style="font-family: Pacifico; font-size: 30px;">Registro</p>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_SESSION['error_message'])): ?>
                            <div class="alert alert-danger">
                                <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['success_message'])): ?>
                            <div class="alert alert-success">
                                <?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?>
                            </div>
                        <?php endif; ?>
                        <form id="registroForm" action="php/registro.php" method="POST" novalidate>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe tu nombre" required minlength="2" maxlength="50">
                                <div class="invalid-feedback">Por favor, escribe tu nombre.</div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Escribe tu email" required>
                                <div class="invalid-feedback">Por favor, escribe un email válido.</div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Escribe tu contraseña" required minlength="8">
                                <div class="invalid-feedback">La contraseña debe tener al menos 6 caracteres y contener al menos una letra mayúscula.</div>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="terms" required>
                                <label class="form-check-label" for="terms">Acepto los términos y condiciones</label>
                                <div class="invalid-feedback">Debes aceptar los términos y condiciones.</div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Registrarse</button>
                            </div>
                            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        </form>
                    </div>
                    <div class="card-footer">
                        <a href="#">¿Has olvidado la contraseña?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="container-fluid bg-dark text-left text-light px-5 pt-2">
        <div class="text-left p-3">
            <p>Todos los Derechos reservados &copy; 2024 | Made with <i class="fa-regular fa-heart"></i> by <span class="text-warning">Silvia Tovar Herrera</span></p>
        </div>
    </footer>

    <link rel="stylesheet" href="./css/driverPopover.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.css">
    <script defer src="./js/registro.js"></script>
    <script src="/js/tourPinicio.js"></script>
    <script>
        // Validación de formulario y términos y condiciones
        document.getElementById('registroForm').addEventListener('submit', function(event) {
            var form = event.target;
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                form.classList.add('was-validated');
            }
        });

        // Agregar validación manual para el campo de términos y condiciones
        document.getElementById('terms').addEventListener('invalid', function() {
            this.setCustomValidity('Debes aceptar los términos y condiciones.');
        });

        document.getElementById('terms').addEventListener('change', function() {
            if (this.checked) {
                this.setCustomValidity('');
            }
        });
    </script>
</body>
</html>
