<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('valor_aprovado');
            $table->string('anexo')->nullable();
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id', 'cliente_id_fk_2602783')->references('id')->on('clientes');
            $table->unsignedBigInteger('plano_id')->nullable();
            $table->foreign('plano_id', 'plano_id_fk_260278822')->references('id')->on('planos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creditos');
    }
}
