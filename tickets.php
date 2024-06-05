
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
    <h1>Tickets</h1>
    <div class="row align-items-center g-2">
      <!-- DISPARADOR MODAL TICKET -->
      <div class="col">
        <a href="#" id="#newIssue" class="btn btn-danger btn-sm px-4 d-grid mt-2" data-bs-toggle="modal" data-bs-target="#ticketModal">Ticket</a>
      </div>
    </div>
  </div>
</div>

<!-- MODAL TICKET START -->
<div class="modal fade" id="ticketModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">
          Crear un nuevo ticket
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <select id="selectModal" class="form-select" aria-label="Default select example" onchange="estadoSelect()">
          <option selected disabled>Seleccione un motivo</option>
          <option value="1">Reclamación de factura</option>

          <option value="2">Modificación de contador</option>

     

        </select>
        <br>
        <!-- reclamacion de factura -->
        <div id="state1" style="display: none">
          <p value="1" class="text-danger">Seleccione la factura y el concepto que quiere revisar.
            Si tiene alguna duda, póngase en contacto con atención al cliente</p>
          <select class="form-select form-select" id="selectModalFactura" onchange="estadoSelect()">
            <option value="Facturas" selected disabled style="font-weight: bold">
              Facturas
            </option>
          </select>
          <br>
          <select id="opcionesFact" class="form-select">
            <option value="EA">Lectura de energia activa y reactiva</option>
            <option value="MAX">Maximetro</option>
            <option value="P">Precios</option>
            <option value="O">Otros</option>
          </select>
          <br>
          <textarea name="informacionExtra1" id="informacionExtra1" cols="60" rows="5" placeholder="Por favor, detalle la consulta" class="form-control table responsive"></textarea>
        </div>
        <!-- modificacion de contador -->
        <div id="state2" style="display: none">
          <p value="2" class="text-danger">Para tramitar el ticket necesita aportar certificado de autorización para gestión de cambio de equipo de medida y Hoja de ensayos del contador.
            Si tiene alguna duda, póngase en contacto con atención al cliente</p>
          <textarea name="informacionExtra2" id="informacionExtra2" cols="60" rows="5" placeholder="Por favor, detalle la consulta" class="form-control table responsive"></textarea>
          <br>
          <div class="my-3">
            <input class="form-control form-control-sm" id="formFileSm" type="file">
          </div>
        </div>
        <!-- modificacion de potencia y tarifa -->
        <div id="state3" class="container" style="display: none">
          <p value="3" class="text-danger">Para tramitar el ticket necesita aportar documento firmado por el cliente, solicitando el cambio de potencias, dicho documento puede descargarlo en el enlace siguiente
            Si tiene alguna duda, póngase en contacto con atención al cliente </p>
          <div class="card text-center">

            <div class="card-body my-0">

              <span class="card-title" style="color: grey; font-size: 20px;">Descarga el formulario</span>
              <br>
              <a href="" id="cambioPotencia" style="text-decoration: none; font-weight: bold;" target="_blank"><span class="material-symbols-outlined" style="font-size: 32px; margin-top: 15px;">download</span></a>
            </div>
          </div>
          <br>
          <textarea name="informacionExtra3" id="informacionExtra3" cols="60" rows="5" placeholder="Por favor, detalle la consulta" class="form-control  table responsive"></textarea>
          <div class="my-3">
            <input class="form-control form-control-sm" id="formFileSm" type="file">
          </div>


        </div>
        <!-- cambio de titular -->
        <div id="state4" class="container" style="display: none">
          <p value="4" class="text-danger">Para tramitar el ticket necesita aportar documento firmado por el cliente, solicitando el cambio de titular, dicho documento puede descargarlo en el enlace siguiente
            Si tiene alguna duda, póngase en contacto con atención al cliente </p>
          <div class="card text-center my-0">
            <div class="card-body">

              <span class="card-title" style="color: grey; font-size: 20px;">Descarga
                el
                formulario</span>
              <br>

              <a href="" id="cambioTitular" style="text-decoration: none; font-weight: bold;" target="_blank"><span class="material-symbols-outlined" style="font-size: 32px; margin-top: 15px;">download</span></a>
            </div>
          </div>
          <br>
          <textarea name="informacionExtra4" id="informacionExtra4" cols="60" rows="5" placeholder="Por favor, detalle la consulta" class="form-control  table responsive"></textarea>
          <div class="my-3">
            <input class="form-control form-control-sm" id="formFileSm" type="file">
          </div>
        </div>
        <!-- modificacion cuenta corriente -->
        <div id="state5" class="container" style="display: none">
          <p value="5" class="text-danger">Para tramitar el ticket necesita aportar documento firmado por el cliente, solicitando el cambio de titular, dicho documento puede descargarlo en el enlace siguiente
            Si tiene alguna duda, póngase en contacto con atención al cliente </p>
          <div class="card text-center">
            <div class="card-body my-0">

              <span class="card-title" style="color: grey; font-size: 20px;">Descarga
                el
                formulario</span>
              <br>
              <a href="" id="cambioCuenta" style="text-decoration: none; font-weight: bold;" target="_blank"><span class="material-symbols-outlined" style="font-size: 32px; margin-top: 15px;">download</span></a>
            </div>
          </div>
          <br>
          <textarea name="informacionExtra5" id="informacionExtra5" cols="60" rows="5" placeholder="Por favor, detalle la consulta" class="form-control  table responsive"></textarea>
          <div class="my-3">
            <input class="form-control form-control-sm" id="formFileSm" type="file">
          </div>
        </div>
        <!-- activacion autoconsumo -->
        <div id="state6" style="display: none">
          <p value="6" class="text-danger">Para tramitar el ticket necesita aportar documento CIE DE GENERACIÓN.
            Si tiene alguna duda, póngase en contacto con atención al cliente </p>
          <textarea name="informacionExtra6" id="informacionExtra6" cols="60" rows="5" placeholder="Por favor, detalle la consulta" class="form-control table responsive"></textarea>
          <div class="my-3">
            <input class="form-control form-control-sm" id="formFileSm" type="file">
          </div>
        </div>
        <!-- otros -->
        <div id="state7" style="display: block">
          <p value="7" class="text-danger">Si tiene alguna duda, póngase en contacto con atención al cliente </p>
          <textarea name="informacionExtra7" id="informacionExtra7" cols="60" rows="5" placeholder="Por favor, detalle la consulta" class="form-control table responsive"></textarea>
          <div class="my-3">
            <input class="form-control form-control-sm" id="formFileSm" type="file">
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Cancelar
        </button>
        <input type="submit" id="enviarTickets" class="btn btn-primary"></input>
      </div>
    </div>
  </div>
</div>
<!-- MODAL TICKET END -->
</div>

  
</body>
</html>
