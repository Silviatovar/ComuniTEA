function ListaCategoria() {
    $.ajax({
        type: 'GET',
        url: './php/cargarCategorias.php',
        dataType: 'json',
        success: function (categorias) {
            console.log(categorias);

            categorias.forEach((categoria, index) => {
                // Añadir contenido de la pestaña
                $('#pictogramas').append(`
                    <div class="tab-pane fade row" 
                    "  id="seccion-${categoria.categoriaID}" role="tabpanel" aria-labelledby="${categoria.categoriaID}-tab">
                        
                    </div>
                `);

                // Añadir nueva pestaña
                $('#myTab').append(`
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="${categoria.categoriaID}-tab" data-bs-toggle="tab" data-bs-target="#seccion-${categoria.categoriaID}" type="button" role="tab" aria-controls="seccion-${categoria.categoriaID}" aria-selected="${index === 0}">
                            <img src="img/pictogramas.png" width="30" /> ${categoria.nombre}
                        </button>
                    </li>
                `);
            });

         
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

            console.log(data); 

            data.forEach(element => {
                $(`#seccion-${element.categoriaID}`).append(`
                    <div class="col-md-3 mb-3 custom-padre">
                        <button class="btn btn-block boton-palabra custom" data-palabra="${element.audioURL}">
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