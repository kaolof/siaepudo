<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudespendientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudespendientes', function (Blueprint $table) {
            $table->string('nombre');
            $table->string('cedula');
            $table->string('postgrado');
            $table->string('solicitud');
            $table->float('precio');
            $table->string('num_comprobante');
            $table->integer('id_estudiante');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE solicitudespendientes ADD imagen_comprobante MEDIUMBLOB");
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudespendientes');
    }
}
