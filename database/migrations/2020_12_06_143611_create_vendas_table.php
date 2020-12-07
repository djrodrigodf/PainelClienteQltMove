<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('proposta_id')->nullable();
            $table->foreign('proposta_id', 'proposta_fk_12653492284')->references('id')->on('propostas');
            $table->decimal('valor', 15,2);
            $table->text('descricao');
            $table->string('item');
            $table->dateTime('dataVenda');
            $table->dateTime('dataFaturamento');
            $table->boolean('ativo');
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
        Schema::dropIfExists('vendas');
    }
}
