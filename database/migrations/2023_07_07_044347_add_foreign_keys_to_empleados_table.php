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
        Schema::table('empleados', function (Blueprint $table) {
            $table->foreign(['id_municipio'], 'empleados_ibfk_1')->references(['id'])->on('catalogos');
            $table->foreign(['id_depto'], 'empleados_ibfk_2')->references(['id'])->on('catalogos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropForeign('empleados_ibfk_1');
            $table->dropForeign('empleados_ibfk_2');
        });
    }
};
