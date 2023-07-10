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
        Schema::create('empleados', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombre', 100)->nullable();
            $table->string('apellido', 100)->nullable();
            $table->string('correo', 150)->nullable();
            $table->string('telefono', 8)->nullable();
            $table->string('direccion', 200)->nullable();
            $table->integer('id_municipio')->nullable()->index('id_municipio');
            $table->integer('id_depto')->nullable()->index('id_depto');
            $table->boolean('activo')->nullable()->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
};
