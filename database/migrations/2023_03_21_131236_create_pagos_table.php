<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            
            //$table->string('id');
            $table->string('banco_emisor');
            $table->string('num_solicitud');
            $table->string('num_comprobante');
            $table->date('fecha');
            $table->float('precio');
            $table->timestamps();
        });
        // once the table is created use a raw query to ALTER it and add the MEDIUMBLOB
        DB::statement("ALTER TABLE pagos ADD imagen_comprobante MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
