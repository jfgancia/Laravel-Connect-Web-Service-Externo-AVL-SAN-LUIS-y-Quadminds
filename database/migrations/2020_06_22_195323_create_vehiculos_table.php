<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('fl');
            $table->string('sfl');
            $table->string('nombre');
            $table->string('patente');
            $table->string('timestamp_post')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('quadminds_vehiculo_id');
            $table->string('ultimo_post')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}
