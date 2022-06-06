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
        Schema::create('faixas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome_faixa',20);
            $table->integer('numero_faixa');
            $table->integer('duracao_faixa');
            $table->unsignedBigInteger('albuns_id');
            $table->foreign('albuns_id')->references('id')->on('albuns')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faixas');
    }
};
