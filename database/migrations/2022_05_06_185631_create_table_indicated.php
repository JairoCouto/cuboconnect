<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableIndicated extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';

            $table->bigInteger('id_usuario')->autoIncrement();
            $table->bigInteger('id_indicado')->comment('ID do usuário que indicou');
            $table->double('cpf')->unique()->comment('CPF do indicado');
            $table->string('email', 150)->comment('Email do indicado');
            $table->bigInteger('situacao')->comment('Situação do indicado');

            $table->timestamps();

            $table->foreign('id_indicado')->references('id_usuario')->on('usuario');
            $table->foreign('situacao')->references('id_situacao')->on('situacao_indicado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
