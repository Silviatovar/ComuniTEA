
function ListaPicUsuarios() {
    $.ajax({
        type: 'GET',
        url: './php/listaPictogramasUsuarios.php',
        dataType: 'json',
        data: {},
        success: function (data) {

            console.log(data)

            data.forEach(element => {
                $('#pictoUsuario').append(`
                <div class="col-md-3 mb-3">
                    <button class="btn  btn-block boton-palabra" data-palabra="${element.audioURL}">
                        <img src="${element.imagenURL}" alt="${element.nombre}" class="img-fluid">
                        <bold>${element.nombre}</bold>
                    </button>
                </div>
                `)   
            });


             
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);        
        }
    });
}

$(document).ready(function () {
    ListaPicUsuarios();
});

