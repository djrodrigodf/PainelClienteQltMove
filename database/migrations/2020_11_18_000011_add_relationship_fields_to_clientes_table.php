<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToClientesTable extends Migration
{
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->unsignedBigInteger('referencia_bancaria_id')->nullable();
            $table->foreign('referencia_bancaria_id', 'referencia_bancaria_fk_2602788')->references('id')->on('referencia_bancaria');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2602796')->references('id')->on('users');
        });
    }
}
