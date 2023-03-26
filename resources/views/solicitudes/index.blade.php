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

  @if (session('alerta'))
      <div class="alert alert-success">
          {{ session('alerta') }}
      </div>
  @endif

  <!-- Elements -->
  <div class="block block-rounded block-bordered mt-4 block-mode-loading-refresh" id="block-oferta">

    <div class="block-header block-header-default bg-white text-left pt-2 pb-2">

      <form method="POST" action="{{ route('solicitudes.guardar') }}" enctype="multipart/form-data">
        @csrf
        <!-- <div id="OpcionSeleccionada"></div> -->
        <h5 class="block-title text-uppercase font-w700 font-size-sm text-black-75 border-bottom mt-4">Tipo de solicitud
        </h5>
        <div class="mb-4">
          <label for="solicitud">Selecciona una opción:</label>
          <select class="form-control" id="num_solicitud" name="num_solicitud">
            <option value="Constancia de notas">Constancia de notas</option>
            <option value="Constancia de estudio">Constancia de estudio</option>
            <option value="Solvencia">Solvencia</option>
            <option value="Record de Notas">Record de Notas</option>
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
          <label for="imagen_comprobante" class="form-label">Captura de pago</label>
          <input type="file" name="imagen_comprobante" class="form-control-file" id="exampleInputEmail1"
            aria-describedby="emailHelp">
        </div>

        <div class="mb-4">
          <label for="precio" class="form-label">Precio</label>
          <input type="text" readonly="true" name="precio" class="form-control" id="precio"
            aria-describedby="emailHelp">
        </div>

        



        <button type="submit" name="guardar" class="btn btn-primary">Pedir solicitud</button>

      </form>
    </div>

    
</div>

  <!-- Elements -->
  <div class="block block-rounded block-bordered mt-4 block-mode-loading-refresh p-4" id="block-oferta">

      <h5 class="block-title text-uppercase font-w700 font-size-sm text-black-75 border-bottom mt-4">historial de
        solicitudes</h5>
      <button class="btn btn-primary mt-4 " id="toggle-table">Cargar historial</button>

      <table class="table mt-4" id="mi-tabla" style="display: none;">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Solicitud</th>
          <th scope="col">Precios</th>
          <th scope="col">Comprobante</th>
          <th scope="col">Estado</th>
        </tr>
      </thead>
      <tbody>
            <?php
              $cont=0;
            ?>
            @foreach ($solicitudespendientes as $solicitud)
                  <tr>
                    <th scope="row">{{$cont=$cont+1}}</th>
                    <td>{{ $solicitud->solicitud }}</td>
                    <td>{{ $solicitud->precio }}</td>
                    <td><button class="btn btn-primary">Ver comprobante</button></td>
                    <td>En espera</td>
                  </tr>
                  @endforeach
            </tbody>
      </table>

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
    var precio = document.getElementById("precio");
    var solicitud = document.getElementById("num_solicitud");
    solicitud.value='Constancia de notas';
    precio.value = 7.8;

    solicitud.addEventListener("change", function() {
      

      if(solicitud.value=='Constancia de notas'){
        precio.value = 7.8;
      }
      if(solicitud.value=="Constancia de estudio"){
        precio.value = 8.3;
      }
      if(solicitud.value=='Solvencia'){
        precio.value = 9.6;
      }
      if(solicitud.value=='Record de Notas'){
        precio.value = 12.8;
      }
    });
      

</script>

@endsection