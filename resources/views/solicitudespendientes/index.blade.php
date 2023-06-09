@extends('plantillas.privada')
@section('content')

<div class="bg-gray-light">
  <div class="content content-full pt-4 pb-4">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
      <h1 class="block-title text-uppercase font-w700 pt-1 vertical-align">
        <i class="fa fa-graduation-cap fa-fw text-black-50"></i>
        <span class="ml-2 font-size-md text-black">Solicitudes</span>
      </h1>
      <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-alt">
          <li class="breadcrumb-item text-black text-uppercase breadcrumb-item-font">SIAEPUDO</li>
          <li class="breadcrumb-item text-black-75 active text-uppercase breadcrumb-item-font-active" aria-current="page">Solicitudes Pendientes</li>
        </ol>
      </nav>
    </div>
  </div>
</div>

<div class="content mb-3">
  <h2 class="content-heading pt-0 mb-0 pb-0 border-bottom font-note text-uppercase">Consulte la informacion de los
    a las solicitudes pendientes de los estudiantes de posgrado</h2>
  <!-- Elements -->

  <div class="block block-rounded block-bordered mt-4 block-mode-loading-refresh" id="block-oferta">

    <div class="block-content">

      <div class="row push">
        <div class="col-12">
          <div class="block block-rounded js-appear-enabled animated fadeIn bg-gray-lighter" data-toggle="appear">
            <div class="block-content block-content-full border-left border-3x border-dark">
              <p class="text-muted mb-0 mt-0 font-size-details text-uppercase font-w700 text-center">
                Informacion correspondiente de los aspirantes a los estudios de postgrado ofertados.
              </p>
            </div>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Cedula</th>
                <th scope="col">Postgrado</th>
                <th scope="col">Solicitud</th>
                <th scope="col">Precios</th>
                <th scope="col">Numero de Comprobante</th>
                <th scope="col">Comprobante</th>
                <th scope="col">Aprobacion</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($solicitudespendientes as $solicitud)
              <tr>
                <td>{{ $solicitud->nombre }}</td>
                <td>{{ $solicitud->cedula }}</td>
                <td>{{ $solicitud->postgrado }}</td>
                <td>{{ $solicitud->solicitud }}</td>
                <td>{{ $solicitud->precio }}</td>
                <td>{{ $solicitud->num_comprobante }}</td>
                <?php
                  $dato=$solicitud->num_comprobante;
                ?>
                <td><a href="{{ route('solicitudespendientes.mostrarComprobante', ['dato' => $dato]) }}"
                    class="btn btn-primary" target="_blank">Ver comprobante</a></td>
                <td><a href="{{ route('solicitudespendientes.generatePDF', ['dato' => $dato]) }}"
                    class="btn btn-primary">Aprobar Solicitud</a></td>

              </tr>
              @endforeach

            </tbody>
          </table>

        </div>
      </div>


      <!-- END Basic Elements -->
    </div>
  </div>
  <!-- END Elements -->
</div>
        

@endsection