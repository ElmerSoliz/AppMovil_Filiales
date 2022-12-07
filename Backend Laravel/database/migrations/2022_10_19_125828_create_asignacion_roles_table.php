<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion_roles', function (Blueprint $table) {
            $table->bigIncrements('idasignacionrol');
            
            $table->unsignedBigInteger('idministerio');
            $table->foreign('idministerio')->references('idministerio')->on('ministerios');
            
            $table->unsignedBigInteger('idmiembro');
            $table->foreign('idmiembro')->references('idmiembro')->on('miembros');
            
            $table->date('fechaInicio');
            $table->date('fechaFinal');

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
        Schema::dropIfExists('asignacionroles');
    }
};
