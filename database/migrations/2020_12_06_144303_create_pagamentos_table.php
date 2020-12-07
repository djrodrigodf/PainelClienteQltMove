<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('valor', 15, 2);
            $table->decimal('valorPago', 15, 2)->nullable();
            $table->dateTime('dataVencimento');
            $table->dateTime('dataEmissao');
            $table->dateTime('dataPagamento')->nullable();
            $table->boolean('ativo');
            $table->string('tipo');
            $table->float('taxas')->nullable();
            $table->string('multa')->nullable();
            $table->integer('desconto')->nullable();
            $table->text('dadosBoleto')->nullable();
            $table->text('gateway')->nullable();
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
        Schema::dropIfExists('pagamentos');
    }
}
