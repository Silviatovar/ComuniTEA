<?php
session_start();
$usuarioID = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : '';
$username = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include 'nav.php'; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/editarPerfil.css">
    <script defer src="./js/crearTickets.js"></script>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Crear Ticket</h1>
                        <!-- Formulario de creación de ticket -->
                        <form id="ticketForm" action="php/crearTicket.php" method="POST">
                            <!-- Nombre de Usuario -->
                            <div class="mb-3">
                                <label for="open_by" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="open_by" name="open_by" value="<?php echo $username; ?>" placeholder="Ingrese su nombre">
                            </div>
                            <!-- Correo Electrónico -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="Ingrese su correo electrónico">
                            </div>
                            <!-- Mensaje -->
                            <div class="mb-3">
                                <label for="mensaje" class="form-label">Mensaje</label>
                                <textarea class="form-control" id="mensaje" name="mensaje" rows="3" placeholder="Ingrese su mensaje"></textarea>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Enviar Ticket</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="container-fluid bg-dark text-left text-light px-5 pt-2">
        <div class="text-left p-3">
            <p>Todos los Derechos reservados &copy; 2024 | Hecho con <i class="fas fa-heart"></i> por Silvia Tovar Herrera</p>
        </div>
    </footer>
</body>
</html>
