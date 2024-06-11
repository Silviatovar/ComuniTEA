<!DOCTYPE html>
<html lang="en">

<?php
session_start();
$usuarioID = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : '';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <?php include 'nav.php'; ?>
    <link rel="stylesheet"
        href="https://fontawesome.com/icons/heart?f=classic&s=solid">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
        crossorigin="anonymous">
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet"
        href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
    <!-- Agrega otros enlaces CSS que necesites -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Graduate&family=Pacifico&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/administracion.css">


    <title>Administración</title>
</head>

<body class="d-flex flex-column min-vh-100">
 

            <body>
                <div class="container mt-5">

                    <div class="container mt-5">
                        <h1 class="text-center mb-4">Administración</h1>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="myTab"
                            role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active"
                                    id="usuarios-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#usuarios"
                                    type="button" role="tab"
                                    aria-controls="usuarios"
                                    aria-selected="true">Usuarios</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link"
                                    id="secciones-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#secciones"
                                    type="button" role="tab"
                                    aria-controls="secciones"
                                    aria-selected="false">Categorias</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link"
                                    id="pictogramas-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#pictogramas"
                                    type="button" role="tab"
                                    aria-controls="pictogramas"
                                    aria-controls="pictogramas"
                                    aria-selected="false">Pictogramas</button>
                            </li>
                     
                            <li class="nav-item" role="presentation">
                                <button class="nav-link"
                                    id="donaciones-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#donaciones"
                                    type="button" role="tab"
                                    aria-controls="donaciones"
                                    aria-selected="false">Donaciones</button>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active"
                                id="usuarios" role="tabpanel"
                                aria-labelledby="usuarios-tab">
                                <!-- Aquí va el DataTable de Usuarios -->
                                <table id="usuariosTable" class="table">
                                    <thead>
                                        <tr>
                                            <th>usuarioID</th>
                                            <th>nombre</th>
                                            <th>email</th>
                                            <th>rol</th>
                                            <th>acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 10px;"></td>
                             
                                    </tbody>
                                </table>
                            </div>
                            <form class="modal fade" id="editarUsuarioModal" tabindex="-1" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editarUsuarioModalLabel">Editar Usuario</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formularioEdicionUsuario">
                                                <div class="mb-3">
                                                    <label for="usuarioID" class="form-label">ID de Usuario</label>
                                                    <input type="text" class="form-control" id="usuarioID" aria-describedby="usuarioIDHelp" disabled>
                                                    <div id="usuarioIDHelp" class="form-text">ID del usuario a editar</div>
                                              </div>
                                                <div class="mb-3">
                                                    <label for="nuevoNombre" class="form-label">Nuevo Nombre</label>
                                                    <input type="text" class="form-control" id="nuevoNombre" aria-describedby="nuevoNombreHelp">
                                                    <div id="nuevoNombreHelp" class="form-text">Nuevo nombre del usuario</div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nuevoEmail" class="form-label">Nuevo Email</label>
                                                    <input type="email" class="form-control" id="nuevoEmail" aria-describedby="nuevoEmailHelp">
                                                    <div id="nuevoEmailHelp" class="form-text">Nuevo email del usuario</div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nuevoRol" class="form-label">Nuevo Rol</label>
                                                    <select class="form-select" id="nuevoRol" aria-describedby="nuevoRolHelp">
                                                        <option selected>Selecciona un nuevo rol</option>
                                                        <option value="1">Administrador</option>
                                                        <option value="2">Usuario</option>
                                                    </select>
                                                    <div id="nuevoRolHelp" class="form-text">Nuevo rol del usuario</div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-primary" id="guardarEdicionUsuarioBtn">Guardar cambios</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            <div class="tab-pane fade" id="secciones" role="tabpanel" aria-labelledby="secciones-tab">
                                <!-- Aquí va el DataTable de Secciones -->
                                <table id="seccionesTable" class="table">
                                    <thead>
                                        <tr>
                                            <th>CategoriaID</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Acciones</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="width: 10px;"></td>
                                            <td style="width: 10px;"></td>
                                            <td style="width: 10px;"></td>
                                            <td style="width: 10px;"></td>
                                         
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <form class="modal fade" id="editarCategoriaModal" tabindex="-1" aria-labelledby="editarCategoriaModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editarCategoriaModalLabel">Editar Categoría</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formularioEdicionCategoria">
                                                <div class="mb-3">
                                                    <label for="categoriaID" class="form-label">ID de Categoría</label>
                                                    <input type="text" class="form-control" id="categoriaID" aria-describedby="categoriaIDHelp" disabled>
                                                    <div id="categoriaIDHelp" class="form-text">ID de la categoría a editar</div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nuevoNombreCategoria" class="form-label">Nuevo Nombre</label>
                                                    <input type="text" class="form-control" id="nuevoNombreC" aria-describedby="nuevoNombreCategoriaHelp">
                                                    <div id="nuevoNombreCategoriaHelp" class="form-text">Nuevo nombre de la categoría</div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nuevaDescripcionCategoria" class="form-label">Nueva Descripción</label>
                                                    <input type="text" class="form-control" id="nuevaDescripcion" aria-describedby="nuevaDescripcionCategoriaHelp">
                                                    <div id="nuevaDescripcionCategoriaHelp" class="form-text">Nueva descripción de la categoría</div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-primary" id="guardarEdicionCategoriaBtn">Guardar cambios</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            

                            <div class="tab-pane fade" id="pictogramas"
                                role="tabpanel"
                                aria-labelledby="pictogramas-tab">
                                <!-- Aquí va el DataTable de Pictogramas -->
                                <table id="PictogramasTable"
                                    class="table">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Audio</th>
                                            <th>Imagen</th>
                                            <th>Categoria</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 10px;"></td>
                                        <td style="width: 10px;"></td>
                                    </tbody>
                                </table>
                            </div>
                        
                          
                            <div class="tab-pane fade" id="donaciones" role="tabpanel" aria-labelledby="donaciones-tab">
                                <!-- Aquí va el DataTable de Donaciones -->
                                <table id="DonacionesTable" class="table">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>monto</th>
                                            <th>Fecha</th>
                                            <th>Mensaje</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="width: 10px;"></td>
                                            <td style="width: 10px;"></td>
                                            <td style="width: 10px;"></td>
                                            <td style="width: 10px;"></td>
                                            <td style="width: 10px;"></td>
                                            <td style="width: 10px;"></td>
                                            <td style="width: 10px;"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 

                        <script
                            src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script
                            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                        <script
                            src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
                        <script
                            src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/js/bootstrap.min.js"></script>
                        <script
                            src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
                        <script
                            src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
                        <script src="./js/generalScript.js" defer></script>
                        <script src="./js/listaUsuario.js"></script>
                        <script src="./js/listaCategorias.js"></script>
                        <script src="./js/listaPictogramas.js"></script>
                        <script src="./js/donaciones.js"></script>
                        

                    </body>

                    </html>

