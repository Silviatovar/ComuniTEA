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
  <link rel="stylesheet" href="css/proyecto.css">  <script
  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script defer src="./js/generalScript.js"></script>
  <script defer src="./js/addPictogramas.js"></script>
  <script defer src="./js/addCategorias.js"></script>
  <script defer src="./js/picUsuarios.js"></script>
  <script defer src="./js/picto.js"></script>
  <script src="include-nav.js" defer></script>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <title>Document</title>
</head>
<header class="mt-5">
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
      <div class="container">
          <a class="navbar-brand" href="#"><img src="img/logo1.png" width="150" height="70" alt></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-3 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="pinicio.html">Sobre Nosotros</a>
                  <li class="nav-item" rol="invitado">
                      <a class="nav-link active" aria-current="page" href="login.html">Accede</a>
                  </li>
                  <li class="nav-item" rol="invitado">
                      <a class="nav-link active" aria-current="page" href="registro.html">Registrate</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="proyecto.html">APP COMUNITEA</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="donaciones.html">Donaciones</a>
                  </li>
                  <li class="nav-item" rol="usuario">
                      <a class="nav-link active" aria-current="page" href="editarPerfil.html">Editar perfil</a>
                  <li class="nav-item">
                      <a class="nav-link active" rol="admin" aria-current="page"
                          href="administracion.html">Administracion</a>
                  </li>
                  <li class="nav-item" rol="usuario">
                      <a class="nav-link active" aria-current="page" href="tickets.html">Notificaciones</a>
                  <li class="nav-item">
                      <a class="nav-link active " aria-current="page" href="./php/logout.php">Cerrar Sesion</a>
                  </li>
              </ul>

          </div>
      </div>
  </nav>




</header>
<body class="d-flex flex-column min-vh-100">

  <!-- INICIO APRENDE1-->
  <div class="bloque1 d-flex p-2 flex-column  mb-3 justify-content-center align-items-center pt-5 pb-5">
    <br>

    <h1>COMUNICATE CON <strong> ComuniTEA</strong> </h1>
    <h3>
      Haz <img src="img/click.png" width="30"></img> sobre los pictogramas para crear una frase y dale al <img
        src="img/play.png" width="30"></img> así podrás comunicarte con los démas
    </h3>

    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const buttons = document.querySelectorAll('.boton-palabra');

        buttons.forEach(button => {
          button.addEventListener('click', () => {
            const palabra = button.getAttribute('data-palabra');
            console.log(palabra)
            hablar(palabra);
          });
        });

        function hablar(texto) {
          const utterance = new SpeechSynthesisUtterance(texto);
          window.speechSynthesis.speak(utterance);
        }
      });
    </script>

  </div>
  <!--Editar-->
  <section class="wrap" id="admin">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 offset-sm-2">

          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general"
                type="button" role="tab" aria-controls="general" aria-selected="true"> <img src="img/general.png"
                  width="30"></img> General</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="acciones-tab" data-bs-toggle="tab" data-bs-target="#acciones" type="button"
                role="tab" aria-controls="acciones" aria-selected="false"> <img src="img/acciones.png" width="30"></img>
                Acciones</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="personas-tab" data-bs-toggle="tab" data-bs-target="#personas" type="button"
                role="tab" aria-controls="personas" aria-selected="false"> <img src="img/personas.png" width="30"></img>
                Personas</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="comida-tab" data-bs-toggle="tab" data-bs-target="#comida" type="button"
                role="tab" aria-controls="comida" aria-selected="false"> <img src="img/comida.png" width="30"></img>
                Comida</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="emociones-tab" data-bs-toggle="tab" data-bs-target="#emociones" type="button"
                role="tab" aria-controls="emocines" aria-selected="false"> <img src="img/emociones.png"
                  width="30"></img> Emociones</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="lugares-tab" data-bs-toggle="tab" data-bs-target="#lugares" type="button"
                role="tab" aria-controls="lugares" aria-selected="false"> <img src="img/lugares.png" width="30"></img>
                Lugares</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="colores-tab" data-bs-toggle="tab" data-bs-target="#colores" type="button"
                role="tab" aria-controls="colores" aria-selected="false"> <img src="img/colores.png" width="30"></img>
                Colores</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pictogramas-tab" data-bs-toggle="tab" data-bs-target="#pictogramas" type="button"
                role="tab" aria-controls="colores" aria-selected="false"> <img src="img/colores.png" width="30"></img>
                Mis pictogramas</button>
            </li>
           
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="add-categoria-tab" data-bs-toggle="modal" data-bs-target="#addCategoriasModal"
                type="button" role="tab" aria-controls="addCategorias" aria-selected="false"> 
                <img src="img/colores.png" width="30"> Añadir Categoria
              </button>
            </li>
          </ul>
  
          <div class="container mt-4">
            <div class="row" id="categoriaUsuario"></div>
          </div>
  
          <!-- Modal para añadir categorías -->
          <div class="modal fade" id="addCategoriasModal" tabindex="-1" aria-labelledby="addCategoriasLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addCategoriasLabel">Añadir Nueva Categoria</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="addCategoriaForm">
                    <div class="mb-3">
                      <label for="categoriaNombre" class="form-label">Nombre de la Categoria</label>
                      <input type="text" class="form-control" id="categoriaNombre" required>
                      <label for="categoriaDescripcion" class="form-label">Descripción de la Categoria</label>
                      <input type="text" class="form-control" id="categoriaDescripcion" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Añadir</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin del modal -->
  
        </div>
      </div>
    </div>
  </section>


          <!-- FIN GEBERAL-->
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
              <div class="container mt-4">
                <div class="row">
                  <!-- Crea un botón para cada palabra -->
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="yo">
                      <img src="general/yo.png" alt="yo" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn btn-block boton-palabra" data-palabra="yo quiero">
                      <img src="general/yo_quiero.png" alt="yo quiero" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn btn-block boton-palabra" data-palabra="yo me siento">
                      <img src="general/yo me siento.png" alt="yo me siento" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn btn-block boton-palabra" data-palabra="yo tengo">
                      <img src="general/yo tengo.png" alt="yo tengo" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn btn-block boton-palabra" data-palabra="yo estoy">
                      <img src="general/yo estoy.png" alt="yo estoy" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn btn-block boton-palabra" data-palabra="yo no lo sé">
                      <img src="general/yo no lo se.png" alt="yo no lo sé" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="estoy bien">
                      <img src="general/estoy bien.png" alt="estoy bien" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="estoy mal">
                      <img src="general/estoy mal.png" alt="estoy mal" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn btn-block boton-palabra" data-palabra=" me gusta">
                      <img src="general/me gusta.png" alt="me gusta" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="no me gusta">
                      <img src="general/no me gusta.png" alt="no me gusta" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="bien">
                      <img src="general/bien.png" alt="bien" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="mal">
                      <img src="general/mal.png" alt="mal" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="sí">
                      <img src="general/sí.png" alt="sí" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="no">
                      <img src="general/no.png" alt="no" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="lo siento">
                      <img src="general/lo siento.png" alt="lo siento" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="se acabó">
                      <img src="general/terminar.png" alt="terminar" class="img-fluid">
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!--FIN GENERAL-->

          <!-- FIN ACCIONES-->
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="acciones" role="tabpanel" aria-labelledby="acciones">
              <div class="container mt-4">
                <div class="row">
                  <!-- Crea un botón para cada palabra -->
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="comer">
                      <img src="acciones/comer.png" alt="comer" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="beber">
                      <img src="acciones/beber.png" alt="beber" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn btn-block boton-palabra" data-palabra="dormir">
                      <img src="acciones/dormir.png" alt="dormir" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="jugar">
                      <img src="acciones/jugar.png" alt="jugar" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="hacer pipi">
                      <img src="acciones/hacer pis.png" alt="hacer pipi" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="hacer caca">
                      <img src="acciones/hacer caca.png" alt="hacer caca" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="ir">
                      <img src="acciones/ir.png" alt="ir" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="vestirme">
                      <img src="acciones/vestir.png" alt="vestirme" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn btn-block boton-palabra" data-palabra="bailar">
                      <img src="acciones/bailar.png" alt="bailar" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="cantar">
                      <img src="acciones/cantar.png" alt="cantar" class="img-fluid">
                    </button>
                  </div>

                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="salir">
                      <img src="acciones/salir.png" alt="salir" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="bañar">
                      <img src="acciones/bañar.png" alt="bañar" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="saltar">
                      <img src="acciones/saltar (1).png" alt="saltar" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="estudiar">
                      <img src="acciones/estudiar.png" alt="estudiar" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="pintar">
                      <img src="acciones/pintar.png" alt="pintar" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="besar">
                      <img src="acciones/besar.png" alt="besar" class="img-fluid">
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--FIN ACCIONES-->

          <!-- FIN PERSONAS-->
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="personas" role="tabpanel" aria-labelledby="personas">
              <div class="container mt-4">
                <div class="row">
                  <!-- Crea un botón para cada palabra -->
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="tú">
                      <img src="personas/tú.png" alt="tú" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn btn-block boton-palabra" data-palabra="mamá">
                      <img src="personas/mamá.png" alt="mamá" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="papá">
                      <img src="personas/papá.png" alt="papá" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="hermano">
                      <img src="personas/hermano.png" alt="hermano" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="hermana">
                      <img src="personas/hermana.png" alt="hermana" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="abuela">
                      <img src="personas/abuela.png" alt="abuela" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn btn-block boton-palabra" data-palabra="abuelo">
                      <img src="personas/abuelo.png" alt="abuelo" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="amigos">
                      <img src="personas/amigos.png" alt="amigos" class="img-fluid">
                    </button>
                  </div>

                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="familia">
                      <img src="personas/familia.png" alt="familia" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="perro">
                      <img src="personas/perro.png" alt="perro" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="gato">
                      <img src="personas/gato.png" alt="gato" class="img-fluid">
                    </button>
                  </div>

                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="caballo">
                      <img src="personas/caballo.png" alt="caballo" class="img-fluid">
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--FIN PERSONAS-->


          <!-- INICIO COMIDA  -->
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="comida" role="tabpanel" aria-labelledby="comida-tab">
              <div class="container mt-4">
                <div class="row">
                  <!-- Crea un botón para cada palabra -->
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="comida">
                      <img src="comida/comida.png" alt="comida" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="bebida">
                      <img src="comida/bebida.png" alt="bebida" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="agua">
                      <img src="comida/agua.png" alt="agua" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn btn-block boton-palabra" data-palabra="zumo">
                      <img src="comida/zumo.png" alt="zumo" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="Cola cao">
                      <img src="comida/Cola-Cao.png" alt="cola cao" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn btn-block boton-palabra" data-palabra="carne">
                      <img src="comida/carne.png" alt="carne" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="pescado">
                      <img src="comida/pescado.png" alt="pescado" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="sandwich">
                      <img src="comida/sandwich.png" alt="sandwich" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="jamón">
                      <img src="comida/jamón.png" alt="jamón" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="patatas fritas">
                      <img src="comida/patatas fritas.png" alt="patatas_fritas" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="tostada">
                      <img src="comida/tostada.png" alt="tostada" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="chocolate">
                      <img src="comida/chocolate.png" alt="chocolate" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="galletas">
                      <img src="comida/galletas.png" alt="galletas" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="sandía">
                      <img src="comida/sandía.png" alt="sandía" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="manzana">
                      <img src="comida/manzana.png" alt="manzana" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="plátano">
                      <img src="comida/plátano.png" alt="plátano" class="img-fluid">
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--FIN COMIDA-->

          <!-- INICIO EMOCIONES -->
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="emociones" role="tabpanel" aria-labelledby="emociones-tab">
              <div class="container mt-4">
                <div class="row">
                  <!-- Crea un botón para cada palabra -->
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="contento">
                      <img src="emociones/contento.png" alt="contento" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn btn-block boton-palabra" data-palabra="alegre">
                      <img src="emociones/alegre.png" alt="alegre" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="romántico">
                      <img src="emociones/romántico.png" alt="romántico" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="divertido">
                      <img src="emociones/divertido.png" alt="divertido" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="enfadado">
                      <img src="emociones/enfadado.png" alt="enfadado" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="cansado">
                      <img src="emociones/cansado.png" alt="cansado" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="triste">
                      <img src="emociones/triste.png" alt="triste" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="aburrido">
                      <img src="emociones/aburrido.png" alt="aburrido" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="confuso">
                      <img src="emociones/confuso.png" alt="confuso" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="distraído">
                      <img src="emociones/distraído.png" alt="distraído" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="sorprendido">
                      <img src="emociones/sorprendido.png" alt="sorprendido" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="tímido">
                      <img src="emociones/tímido.png" alt="tímido" class="img-fluid">
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--FIN EMOCIONES-->


          <!-- INICIO lugares -->
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="lugares" role="tabpanel" aria-labelledby="lugares-tab">
              <div class="container mt-4">
                <div class="row">
                  <!-- Crea un botón para cada palabra -->
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="a casa">
                      <img src="lugares/casa.png" alt="casa" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn btn-block boton-palabra" data-palabra=" al parque">
                      <img src="lugares/parque.png" alt="parque" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra=" al colegio">
                      <img src="lugares/colegio.png" alt="colegio" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra=" al centro comercial">
                      <img src="lugares/centro comercial.png" alt="centro comercial" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="al cine">
                      <img src="lugares/cine.png" alt="cine" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="al museo">
                      <img src="lugares/museo.png" alt="museo" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="a la piscina">
                      <img src="lugares/piscina.png" alt="piscina" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="a la playa">
                      <img src="lugares/playa.png" alt="playa" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="al zoo">
                      <img src="lugares/zoo.png" alt="zoo" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="al mercado">
                      <img src="lugares/mercado.png" alt="mercado" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="al hospital">
                      <img src="lugares/hospital.png" alt="hospital" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="al campo">
                      <img src="lugares/campo.png" alt="campo" class="img-fluid">
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--FIN lugares-->

          <!-- INICIO COLORES -->
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="colores" role="tabpanel" aria-labelledby="colores-tab">
              <div class="container mt-4">
                <div class="row">
                  <!-- Crea un botón para cada palabra -->
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="colores">
                      <img src="colores/colores.png" alt="colores" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn btn-block boton-palabra" data-palabra="amarillo">
                      <img src="colores/amarillo.png" alt="amarillo" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="azul">
                      <img src="colores/azul.png" alt="azul" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="marrón">
                      <img src="colores/marrón.png" alt="marrón" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="naranja">
                      <img src="colores/naranja.png" alt="naranja" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="rojo">
                      <img src="colores/rojo.png" alt="rojo" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="rosa">
                      <img src="colores/rosa.png" alt="rosa" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="verde">
                      <img src="colores/verde.png" alt="verde" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="violeta">
                      <img src="colores/violeta.png" alt="violeta" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="blanco">
                      <img src="colores/blanco.png" alt="blanco" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="negro">
                      <img src="colores/negro.png" alt="negro" class="img-fluid">
                    </button>
                  </div>
                  <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="dorado">
                      <img src="colores/dorado.png" alt="dorado" class="img-fluid">
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--FIN COLORES-->

             <!-- INICIO COLORES -->
             <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="pictogramas" role="tabpanel" aria-labelledby="pictogramas-tab">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPictogramas">
               Añadir pictogramas
                </button>
          
                <div class="container mt-4">
                  <div class="row" id="pictoUsuario">
                    
                  </div>
  </section>

  <!-- <form class="modal fade" id="addCategorias" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Nueva Categoria</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">        
            <div class="mb-3">
              <label for="itemName" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombreC" name="itemName" >
            </div>   
            <div class="mb-3">
              <label for="itemName" class="form-label">Descripción de la categoria</label>
              <input type="text" class="form-control" id="descripcion" name="itemName">
            </div>     
                 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
      </div>
    </div>
  </form> -->
  
  <form class="modal fade" id="addPictogramas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <p class="text-danger">Tenga en cuenta que los pictogramas subidos serán revisados por un administrador,No se permiten imagenes con contenido sensible y/o violento en dicho caso se eliminaran y no podra hacer uso de ellos </p>
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Nuevo Elemento</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">        
            <div class="mb-3">
              <label for="itemName" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="itemName" required value="hola">
            </div>
            <div class="mb-3">
              <label for="itemName" class="form-label">Texto a reproducir</label>
              <input type="text" class="form-control" id="audio" name="audio" required value="hola">
            </div>
            
            <div class="mb-3">
              <label for="itemImage" class="form-label">Imagen</label>
              <p class="text-muted text-danger ">Tamaño maximo de archivo 5Mb</p>

              <input class="form-control" type="file" id="imagen" name="imagen" accept="image/*" required>
            </div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
      </div>
    </div>
  </form>
  

  </div>
  <!--INICIO FOOTER-->
  <footer class="container-fluid bg-dark text-lefts text-light px-5 pt-2">
    <div class="text-left p-3">
      <p>Todos los Derechos reservadors &copy; 2024 | Made with by <i class="fa-regular fa-heart"></i> <span
          class="text-warning">Silvia Tovar Herrera</span></p>
    </div>
  </footer>
  <!--FIN FOOTER-->

  <script>
    $(document).on('click', '.boton-palabra', function(element) {
      const utterance = new SpeechSynthesisUtterance(element.currentTarget.attributes['data-palabra'].value);
          window.speechSynthesis.speak(utterance);
          
    console.log('TEST', element);
  }) ;
  </script>
</body>

</html>