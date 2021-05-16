<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGabaritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gabaritos', function (Blueprint $table) {
            $table->id();
            $table->string('vc_title');
            $table->string('vc_gabarito');
            $table->string('vc_descricao_gabarito');
            // $table->integer('id_tarefa');
            // $table->foreign('id_tarefa')->references('id')->on('tarefas');
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
        Schema::dropIfExists('gabaritos');
    }
}
