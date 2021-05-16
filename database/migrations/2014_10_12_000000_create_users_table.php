<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('email')->unique();
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('password');
        //     $table->rememberToken();
        //     $table->foreignId('current_team_id')->nullable();
        //     $table->text('profile_photo_path')->nullable();
        //     $table->timestamps();
        // });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('vc_nomeUtilizador')->nullable();
            $table->string('vc_email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('vc_tipoUtilizador')->default('Encarregado');
            $table->string('vc_telefone')->nullable();
            $table->string('vc_primemiroNome')->nullable();
            $table->string('vc_nome_meio')->nullable();
            $table->string('vc_apelido')->nullable();
            $table->string('vc_genero')->nullable();
            $table->string('vc_BI')->nullable();
            $table->date('dt_data_nascimento')->nullable();
            $table->unsignedBigInteger('it_num_processo')->nullable();
            //$table->unsignedBigInteger('it_id_pai_utilizador')->nullable();
            //$table->foreign('it_id_pai_utilizador')->references('id')->on('users')->onDelete('CASCADE')->onUpgrade('CASCADE')->nullable();
            //$table->unsignedBigInteger('it_id_escola')->nullable();
            //$table->foreign('it_id_escola')->references('id')->on('escolas')->onDelete('CASCADE')->onUpgrade('CASCADE')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
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
        Schema::dropIfExists('users');
    }
}
