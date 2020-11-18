<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenciaPessoalsTable extends Migration
{
    public function up()
    {
        Schema::create('referencia_pessoals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_completo')->nullable();
            $table->string('telefone')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
