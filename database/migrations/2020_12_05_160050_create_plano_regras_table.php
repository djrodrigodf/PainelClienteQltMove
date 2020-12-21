<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanoRegrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plano_regras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('vigencia');
            $table->decimal('valor', 15, 2);
            $table->integer('desconto');
            $table->decimal('diaria', 15, 2);
            $table->decimal('caucao', 15, 2);
            $table->decimal('participacaoColisao', 15, 2);
            $table->decimal('participacaoTerceiro', 15, 2);
            $table->decimal('participacaoRoubo', 15, 2);
            $table->integer('kmExedente');
            $table->integer('QtdKmFranquiaMensalPadrao');
            $table->unsignedBigInteger('plano_id')->nullable();
            $table->foreign('plano_id', 'plano_fk_26534984')->references('id')->on('planos');
            $table->unsignedBigInteger('proposta_id')->nullable();
            $table->foreign('proposta_id', 'proposta_fk_126534984')->references('id')->on('propostas');
            $table->boolean('ativo')->default(1);
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
        Schema::dropIfExists('plano_regras');
    }
}
