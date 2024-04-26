//usuarios

$(document).ready(function() {

  $('#UsuariosTable').DataTable({

  });

  // Supongamos que tienes un array de objetos llamado `data` con los datos de los pictogramas
  var data = [
      {usuario:"Juan" ,nombre: "Juan", apellidos: "Tovar Herrera", email: "juan@gmail.com", teléfono: "954156953" },
      {usuario:"Juan" ,nombre: "Juan", apellidos: "Tovar Herrera", email: "juan@gmail.com", teléfono: "954156953" },
      {usuario:"Juan" ,nombre: "Juan", apellidos: "Tovar Herrera", email: "juan@gmail.com", teléfono: "954156953" },
      {usuario:"Juan" ,nombre: "Juan", apellidos: "Tovar Herrera", email: "juan@gmail.com", teléfono: "954156953" },
  ];

  // Obtén una referencia al DataTable
  var table = $('#PictogramasTable').DataTable();

  // Agrega cada fila al DataTable
  data.forEach(function(item) {
      table.row.add([
          item.usuario,
          item.nombre,
          item.apellidos,
          item.email,
          item.teléfono,
          `<button class="btn btn-primary btn-sm editar" onclick="editarPictograma('${item.nombre}')">Editar</button>
           <button class="btn btn-danger btn-sm eliminar" onclick="eliminarPictograma('${item.nombre}')">Eliminar</button>`
      ]).draw(false);
  });
});

//pictogramas
$(document).ready(function() {

  $('#PictogramasTable').DataTable({

  });

  // Supongamos que tienes un array de objetos llamado `data` con los datos de los pictogramas
  var data = [
      { nombre: "Pictograma 1", audio: "audio1.mp3", imagen: "imagen1.png", seccion: "Acciones" },
      { nombre: "Pictograma 2", audio: "audio2.mp3", imagen: "imagen2.png", seccion: "Comida" },
      { nombre: "Pictograma 1", audio: "audio1.mp3", imagen: "imagen1.png", seccion: "Acciones" },
      { nombre: "Pictograma 2", audio: "audio2.mp3", imagen: "imagen2.png", seccion: "Comida" },

  ];

  // Obtén una referencia al DataTable
  var table = $('#PictogramasTable').DataTable();

  // Agrega cada fila al DataTable
  data.forEach(function(item) {
      table.row.add([
          item.nombre,
          item.audio,
          item.imagen,
          item.seccion,
          `<button class="btn btn-primary btn-sm editar" onclick="editarPictograma('${item.nombre}')">Editar</button>
           <button class="btn btn-danger btn-sm eliminar" onclick="eliminarPictograma('${item.nombre}')">Eliminar</button>`
      ]).draw(false);
  });
});

//seciones
$(document).ready(function() {

  $('#PictogramasTable').DataTable({

  });

  // Supongamos que tienes un array de objetos llamado `data` con los datos de los pictogramas
  var data = [
      { nombre: "Pictograma 1" },
      { nombre: "Pictograma 2" },
      { nombre: "Pictograma 1"},
      { nombre: "Pictograma 2" },

  ];

  // Obtén una referencia al DataTable
  var table = $('#seccionesTable').DataTable();

  // Agrega cada fila al DataTable
  data.forEach(function(item) {
      table.row.add([
          item.nombre,
          `<button class="btn btn-primary btn-sm editar" onclick="editarPictograma('${item.nombre}')">Editar</button>
           <button class="btn btn-danger btn-sm eliminar" onclick="eliminarPictograma('${item.nombre}')">Eliminar</button>`
      ]).draw(false);
  });
});

//donaciones
$(document).ready(function() {

  $('#PictogramasTable').DataTable({

  });

  // Supongamos que tienes un array de objetos llamado `data` con los datos de los pictogramas
  var data = [
      { Usuario: "Pictograma 1", Fecha: "12/12/2020", cantidad: "12", estado: "Pendiente" },
      { Usuario: "Pictograma 1", Fecha: "12/12/2020", cantidad: "12", estado: "Pendiente" },
      { Usuario: "Pictograma 1", Fecha: "12/12/2020", cantidad: "12", estado: "Pendiente" },
      { Usuario: "Pictograma 1", Fecha: "12/12/2020", cantidad: "12", estado: "Pendiente" },
  ];

  // Obtén una referencia al DataTable
  var table = $('#seccionesTable').DataTable();

  // Agrega cada fila al DataTable
  data.forEach(function(item) {
      table.row.add([
          item.Usuario,
          item.Fecha,
          item.cantidad,
          item.estado,
          `<button class="btn btn-primary btn-sm editar" onclick="editarPictograma('${item.nombre}')">Editar</button>
           <button class="btn btn-danger btn-sm eliminar" onclick="eliminarPictograma('${item.nombre}')">Eliminar</button>`
      ]).draw(false);
  });
});
