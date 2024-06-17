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
    <link rel="stylesheet" href="css/estilos_generales.css">
    <script defer src="./js/crearTickets.js"></script>
    <script defer src="./js/ticketsUsuario.js"></script>
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
        .imglogo{
            margin-top: 40%;
        }
        .tickets-text{
            text-align: center;
            margin-top: 45%
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12"> <!-- Ajuste aquí para hacer la tarjeta más ancha -->
                <div class="card card-custom p-4">
                <div class="col text-end">
                    <button type="button" class="btn m-0 p-0" data-bs-toggle="modal" data-bs-target="#historyModal">
                      <span class="material-symbols-outlined material-history">history</span>
                    </button>
                  </div>
           
                  
                    <div class="row">
                       
                        <div class="col-12 col-md-6">
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
                         <div class="col-12 col-md-6 logo-container">    
                            <img  class="imglogo"src="img/conversacion.png" alt="Logo" width="60%" class="img-fluid">
                        <div class="tickets-text">
                                <p>¡Comunicate con nosotros! Gracias a la creación de tickets podremos saber exactamente como ayudarte, tu opnión nos importa.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="historyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Historial de Notificaciones</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <span>
                        <strong>Tickets de <?php echo $username; ?> </strong>
                      </span>
                      <span class="text-danger" id="datosCups_rojoModal">
                      </span>
                      <div class="text-start mt-3" style="font-size: 17px; color:lightseagreen; font-weight: bold1;">
                        <span class="material-symbols-outlined align-middle mx-2">chat</span>
                      </div>
                      <div id="cuerpoMsj">
                      </div>
                      <br>


                      <button type="button" class="btn text-danger  btn-sm mt-1 " id="abrirFormulario">
                        <i class="fi fi-sr-redo">Responder Mensaje</i>
                      </button>

                      <!-- Formulario de respuesta de mensaje -->
                      <form id="formularioRespuesta" style="display: none;">
                        <textarea name="respuestaMensaje" id="respuestaMensaje" cols="60" rows="5" placeholder="Por favor, escriba aquí su respuesta" class="form-control table responsive"></textarea>
                        <div class="my-3">
                          <input class="form-control form-control-sm" id="adjuntarArchivo" type="file">
                        </div>
                        <button type="button" class="btn btn-secondary" id="cancelarRespuesta">Cancelar</button>
                        <input type="submit" class="btn btn-primary float-end" id="enviarRespuesta"> </input>
                      </form>


                      <!-- /////////////////////////// CHAT SECTION ///////////////////////////////////// -->


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
</body>
</html>
 <!-- Script para mostrar el mensaje del ticket seleccionado -->
    <script>
        // Función para cargar el mensaje del ticket seleccionado
        document.addEventListener('DOMContentLoaded', function () {
            var ticketSelect = document.getElementById('ticketSelect');
            var mensajeTextarea = document.getElementById('mensaje');

            ticketSelect.addEventListener('change', function () {
                var selectedTicketId = this.value;
                var selectedTicket = <?php echo json_encode($tickets); ?>.find(ticket => ticket.id_ticket == selectedTicketId);

                if (selectedTicket) {
                    mensajeTextarea.value = selectedTicket.mensaje;
                } else {
                    mensajeTextarea.value = '';
                }
            });
        });
    </script>