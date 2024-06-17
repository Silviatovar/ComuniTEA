<!DOCTYPE html>
<html lang="en">

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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="css/estilos_generales.css">

  <title>Inicio de sesión</title>
</head>

  <style>
    .warning {
      color: red;
      display: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="card-header">
            <h1 class="card-title text-center mb-4" style="font-family: 'Pacifico', cursive; font-size: 30px;">Inicio de sesión</h1>
          </div>
          <div class="card-body">
            <form id="loginForm" action="php/login.php" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Escribe tu email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Escribe tu contraseña" required autocomplete="current-password">
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="termsCheck">
                <label class="form-check-label" for="termsCheck">Acepto los términos y condiciones</label>
              </div>
              <div class="warning" id="warningMessage">Debes aceptar los términos y condiciones para iniciar sesión.</div>
              <div class="mb-3">
                <button type="submit" class="btn btn-success">Iniciar Sesión</button>
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

  <footer class="container-fluid bg-dark text-left text-light px-5 pt-2">
    <div class="text-left p-3">
      <p>Todos los Derechos reservados &copy; 2024 | Made with by <i class="fa-regular fa-heart"></i> <span class="text-warning">Silvia Tovar Herrera</span></p>
    </div>
  </footer>

  <script defer src="./js/generalScript.js"></script>
  <script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
      var termsCheck = document.getElementById('termsCheck');
      var warningMessage = document.getElementById('warningMessage');

      if (!termsCheck.checked) {
        event.preventDefault(); // Previene el envío del formulario
        warningMessage.style.display = 'block'; // Muestra el mensaje de advertencia
      } else {
        warningMessage.style.display = 'none'; // Oculta el mensaje de advertencia si la casilla está marcada
      }
    });
  </script>
</body>
</html>
