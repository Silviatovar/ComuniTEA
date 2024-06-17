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
    <title>Donaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/estilos_generales.css">
    <style>
        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
        .card-custom {
            background-color: white;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f5eadc;
        }
        .imgLogo {
            margin-top: 30%;
        }
        .donation-text {
            text-align: center;
            margin-top: 40%
        }
        .donation-form {
            margin-top: 20px;
        }
  
    </style>
</head>

<body class="d-flex flex-column min-vh-90">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                <div class="card card-custom p-4">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card-body">
                                <h1 class="card-title text-center mb-4">Donaciones</h1>
                                <!-- Formulario de donaciones -->
                                <form id="donationForm" action="php/procesarDonacion.php" method="POST" class="donation-form">
                                    <!-- Nombre de Usuario -->
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $username; ?>" placeholder="Ingrese su nombre">
                                    </div>
                                    <!-- Correo Electrónico -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="Ingrese su correo electrónico">
                                    </div>
                                    <!-- Cantidad de Donación -->
                                    <div class="mb-3">
                                        <label for="cantidad" class="form-label">Cantidad de Donación</label>
                                        <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad de su donación">
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary" type="submit">Realizar Donación</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 logo-container">
                            <img class="imgLogo" src="img/donar.png" alt="Donaciones" width="60%" class="img-fluid">
                            <div class="donation-text">
                                <p>¡Gracias por tu generosidad! Tu donación contribuye directamente a mejorar nuestras iniciativas comunitarias.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="container-fluid bg-dark text-left text-light px-5 pt-2 mt-auto">
        <div class="text-left p-3">
            <p>Todos los Derechos reservados &copy; 2024 | Hecho con <i class="fas fa-heart"></i> por Silvia Tovar Herrera</p>
        </div>
    </footer>

    <!-- Bootstrap y otros scripts JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
