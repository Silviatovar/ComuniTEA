// function ListaPicUsuarios() {
//     $.ajax({
//         type: 'GET',
//         url: './php/listaPictogramasUsuarios.php',
//         dataType: 'json',
//         success: function (data) {
//             if (data.error) {
//                 console.error(data.error);
//                 return;
//             }

//             if (data.mensaje) {
//                 console.log(data.mensaje);
//                 return;
//             }

//             console.log(data); // Asegúrate de que los datos se están recibiendo correctamente

//             data.forEach(element => {
//                 $('#pictoUsuario').append(`
//                     <div class="col-md-3 mb-3">
//                         <button class="btn btn-block boton-palabra" data-palabra="${element.audioURL}">
//                             <img src="${element.imagenURL}" alt="${element.nombre}" class="img-fluid">
//                             <bold>${element.nombre}</bold>
//                         </button>
//                     </div>
//                 `);
//             });
//         },
//         error: function (xhr, status, error) {
//             console.log(xhr.responseText);
//             console.error(error);
//         }
//     });
// }

// $(document).ready(function () {
//     ListaPicUsuarios();
// });
