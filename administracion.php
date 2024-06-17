<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags and CSS includes -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'nav.php'; ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="css/administracion.css">
    <title>Administración</title>

</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Administración</h1>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="usuarios-tab" data-bs-toggle="tab" data-bs-target="#usuarios" type="button" role="tab" aria-controls="usuarios" aria-selected="true">Usuarios</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="secciones-tab" data-bs-toggle="tab" data-bs-target="#secciones" type="button" role="tab" aria-controls="secciones" aria-selected="false">Categorias</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pictogramas-tab" data-bs-toggle="tab" data-bs-target="#pictogramas" type="button" role="tab" aria-controls="pictogramas" aria-selected="false">Pictogramas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="donaciones-tab" data-bs-toggle="tab" data-bs-target="#donaciones" type="button" role="tab" aria-controls="donaciones" aria-selected="false">Donaciones</button>
            </li>
        </ul>
        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="usuarios" role="tabpanel" aria-labelledby="usuarios-tab">
                <table id="usuariosTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>usuarioID</th>
                            <th>nombre</th>
                            <th>email</th>
                            <th>rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
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

            <div class="tab-pane fade col-md-12" id="secciones" role="tabpanel" aria-labelledby="secciones-tab">
                <table id="seccionesTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>CategoriaID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
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
                            
            <div class="tab-pane fade" id="pictogramas" role="tabpanel" aria-labelledby="pictogramas-tab">
                <table id="pictogramasTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Audio</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="donaciones" role="tabpanel" aria-labelledby="donaciones-tab">
                <table id="DonacionesTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Usuario ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Monto</th>
                            <th>Fecha</th>
                            <th>Mensaje</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="./js/generalScript.js" defer></script>
<script src="./js/listaUsuario.js"></script>
<script src="./js/listaCategorias.js"></script>
<script src="./js/listaPictogramas.js"></script>
<script src="./js/donaciones.js"></script>
</body>
</html>
