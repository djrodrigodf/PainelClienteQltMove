<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenciaBancariaTable extends Migration
{
    public function up()
    {
        Schema::create('referencia_bancaria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('banco_codigo')->nullable();
            $table->string('agencia_codigo')->nullable();
            $table->string('conta')->nullable();
            $table->string('tempo_de_conta')->nullable();
            $table->string('cartao_de_credito')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
