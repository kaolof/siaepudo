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

      <form method="POST" action="{{ route('solicitudes.guardar') }}">
        @csrf
        <!-- <div id="OpcionSeleccionada"></div> -->
        <h5 class="block-title text-uppercase font-w700 font-size-sm text-black-75 border-bottom mt-4">Tipo de solicitud
        </h5>
        <div class="mb-4">
          <label for="solicitud">Selecciona una opción:</label>
          <select class="form-control" id="num_solicitud" name="num_solicitud">
            <option value="1">Contancia de notas</option>
            <option value="2">Constnacia de estudio</option>
            <option value="3">solvencia</option>
            <option value="4">Record</option>
          </select>
        </div>
        <h5 class="block-title text-uppercase font-w700 font-size-sm text-black-75 border-bottom mt-4">Registrar datos
          de
          pago</h5>
        <div class="mb-4">
          <label for="banco_emisor" class="form-label">Banco emisor</label>
          <input type="text" name="banco_emisor" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp">
        </div>

        <div class="mb-4">
          <label for="num_comprobante" class="form-label">Comprobante</label>
          <input type="text" name="num_comprobante" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp">
        </div>

        <div class="mb-4">
          <label for="fecha" class="form-label">Fecha realizado</label>
          <input type="date" name="fecha" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-4">
          <label for="exampleInputEmail1" class="form-label">Captura de pago</label>
          <input type="file" name="imagen_comprobante" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp">
        </div>

        <div class="mb-4">
          <label for="precio" class="form-label">Precio</label>
          <input type="text" readonly="true" name="precio" class="form-control" id="precio"
            aria-describedby="emailHelp">
        </div>

        <!--input type="hidden" name="id" value="{{ auth()->user()->id }}"-->

        <button type="submit" class="btn btn-primary">Submit</button>

      </form>
    </div>

    
</div>

  <!-- Elements -->
  <div class="block block-rounded block-bordered mt-4 block-mode-loading-refresh" id="block-oferta">

      <h5 class="block-title text-uppercase font-w700 font-size-sm text-black-75 border-bottom mt-4">historial de
        solicitudes</h5>
      <button id="toggle-table">Cargar historial</button>

      <table id="mi-tabla" style="display: none;">
        <thead>
          <tr>
            <th scope="col">Solicitud</th>
            <th scope="col">Precios</th>
            <th scope="col">Comprobante</th>
            <th scope="col">Estado</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($solicitudespendientes as $solicitud)
              <tr>
                <td>{{ $solicitud->solicitud }}</td>
                <td>{{ $solicitud->precio }}</td>
                <td><button class="btn btn-primary">Ver comprobante</button></td>
                <td>En espera</td>

              </tr>
              @endforeach
        </tbody>
      </table>
    </div>

  </div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#toggle-table").click(function() {
            $("#mi-tabla").toggle();
        });
    });
</script>
<script>
    var precio= document.getElementById("precio");
    var solicitud = document.getElementById("num_solicitud");
    solicitud.value='1';
    precio.value = '7,8';

    solicitud.addEventListener("change", function() {
      

      if(solicitud.value=='1'){
        precio.value = '7,8';
      }
      if(solicitud.value=='2'){
        precio.value = '8,3';
      }
      if(solicitud.value=='3'){
        precio.value = '9,6';
      }
      if(solicitud.value=='4'){
        precio.value = '12,8';
      }
    });
      

</script>

@endsection