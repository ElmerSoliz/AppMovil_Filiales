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
        Schema::create('ministerio_asignacions', function (Blueprint $table) {
            $table->bigIncrements('idministerioasignacion');

            $table->unsignedBigInteger('iduser');
            $table->foreign('iduser')->references('id')->on('users');
            $table->unsignedBigInteger('idasignacionrol');
            $table->foreign('idasignacionrol')->references('idasignacionrol')->on('asignacion_roles');

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
        Schema::dropIfExists('ministerioasignacion');
    }
};
