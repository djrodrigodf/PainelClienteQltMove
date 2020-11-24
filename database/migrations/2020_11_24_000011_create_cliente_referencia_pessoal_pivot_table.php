<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteReferenciaPessoalPivotTable extends Migration
{
    public function up()
    {
        Schema::create('cliente_referencia_pessoal', function (Blueprint $table) {
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id', 'cliente_id_fk_2602787')->references('id')->on('clientes')->onDelete('cascade');
            $table->unsignedBigInteger('referencia_pessoal_id');
            $table->foreign('referencia_pessoal_id', 'referencia_pessoal_id_fk_2602787')->references('id')->on('referencia_pessoals')->onDelete('cascade');
        });
    }
}
