@extends('plantillas.privada')
@section('content')




<div class="bg-gray-light">
  <div class="content content-full pt-4 pb-4">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
      <h1 class="block-title text-uppercase font-w700 pt-1 vertical-align">
        <i class="fa fa-file fa-fw text-black-50"></i>
        <span class="ml-2 font-size-md text-black">Solicitudes</span>
      </h1>
      <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-alt">
          <li class="breadcrumb-item text-black text-uppercase breadcrumb-item-font">SIAEPUDO</li>
          <li class="breadcrumb-item text-black-75 active text-uppercase breadcrumb-item-font-active"
            aria-current="page">Solicitudes</li>
        </ol>
      </nav>
    </div>
  </div>
</div>

<div class="content mb-3">
  <h2 class="content-heading pt-0 mb-0 pb-0 border-bottom font-note text-uppercase">consulte y realice sus solicitudes
  </h2>
  <!-- Elements -->
  <div class="block block-rounded block-bordered mt-4 block-mode-loading-refresh" id="block-oferta">
    <div class="block-header block-header-default bg-white text-left pt-2 pb-2">
      <h5 class="block-title text-uppercase font-w700 font-size-sm text-black-75 border-bottom mt-4">Tipo de solicitud
      </h5>
    </div>
    <!-- Carga los estilos de Bootstrap -->

    <div class="container">

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="opcion">Selecciona una opción:</label>
            <select class="form-control" id="opcion">
              <option value="Contancia de notas">Contancia de notas</option>
              <option value="Constnacia de estudio">Constnacia de estudio</option>
              <option value="solvencia">solvencia</option>
              <option value="Record">Record</option>
            </select>
          </div>
          <button class="btn btn-primary" id="btnAgregar">Agregar a la tabla</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="content mb-3">

  <!-- Elements -->
  <div class="block block-rounded block-bordered mt-4 block-mode-loading-refresh" id="block-oferta">
    <div class="block-header block-header-default bg-white text-left pt-2 pb-2">
      <h5 class="block-title text-uppercase font-w700 font-size-sm text-black-75 border-bottom mt-4">Registrar datos de
        pago</h5>
    </div>
    <div class="block-header block-header-default bg-white text-left pt-2 pb-2">

      <form method="POST" action="{{ route('solicitudes.guardar') }}">
        @csrf
        <div id="OpcionSeleccionada"></div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Banco emisor</label>
          <input type="text" name="banco_emisor" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Comprobante</label>
          <input type="text" name="num_comprobante" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Fecha realizado</label>
          <input type="date" name="fecha" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Captura de pago</label>
          <input type="file" name="imagen_comprobante" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Precio</label>
          <input type="text" disabled="true" value=25 name="precio" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <!--input type="hidden" name="id" value="{{ auth()->user()->id }}"-->

        <button type="submit" class="btn btn-primary">Submit</button>

      </form>

    </div>

  </div>
</div>

<script>
    var boton = document.getElementById("btnAgregar");
    $(document).ready(function() {
        $('#btnAgregar').click(function() {
            var opcionSeleccionada = $('#opcion').val();
            $('#OpcionSeleccionada').append('<h5>' + opcionSeleccionada + '</h5>');
            boton.setAttribute("disabled", "true");
        });
    });
</script>

@endsection