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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->date('date'); //DIA
            $table->dateTime('start_time'); //FECHA Y HORA DE INICIO
            $table->dateTime('end_time'); //FECHA Y HORA DE FIN

            //Llave foranea de usuario 1 a muchos...
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                                                        ->onDelete('cascade');
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
        Schema::dropIfExists('shifts');
    }
};
