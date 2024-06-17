function ListaCategoria() {
    $.ajax({
        type: 'GET',
        url: './php/cargarCategorias.php',
        dataType: 'json',
        success: function (categorias) {
            console.log(categorias);

            categorias.forEach((categoria, index) => {
                // Añadir contenido de la pestaña
                $('#myTabContent').append(`
                    <div class="tab-pane fade ${index === 0 ? 'show active' : ''}" id="seccion-${categoria.categoriaID}" role="tabpanel" aria-labelledby="${categoria.categoriaID}-tab">
                        <div class="container mt-4">
                            <div class="row" id="categoria-${categoria.categoriaID}">
                                <!-- Contenido de la categoría -->
                            </div>
                        </div>
                    </div>
                `);

                // Añadir nueva pestaña
                $('#myTab').append(`
                    <li class="nav-item" role="presentation">
                        <button class="nav-link ${index === 0 ? 'active' : ''}" id="${categoria.categoriaID}-tab" data-bs-toggle="tab" data-bs-target="#seccion-${categoria.categoriaID}" type="button" role="tab" aria-controls="seccion-${categoria.categoriaID}" aria-selected="${index === 0}">
                            <img src="img/pictogramas.png" width="30" /> ${categoria.nombre}
                        </button>
                    </li>
                `);
            });

            // Ahora que las categorías están cargadas, carga los pictogramas
            ListaPicUsuarios();
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);        
        }
    });
}
function ListaPicUsuarios() {
    $.ajax({
        type: 'GET',
        url: './php/listaPictogramasUsuarios.php',
        dataType: 'json',
        success: function (data) {
            if (data.error) {
                console.error(data.error);
                return;
            }

            if (data.mensaje) {
                console.log(data.mensaje);
                return;
            }

            console.log(data); // Asegúrate de que los datos se están recibiendo correctamente

            data.forEach(element => {
                $('#pictoUsuario').append(`
                    <div class="col-md-3 mb-3">
                        <button class="btn btn-block boton-palabra" data-palabra="${element.audioURL}">
                            <img src="${element.imagenURL}" alt="${element.nombre}" class="img-fluid custom-img">
                            <bold>${element.nombre}</bold>
                        </button>
                    </div>
                `);
            });
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
            console.error(error);
        }
    });
}


$(document).ready(function () {
    ListaCategoria();
});