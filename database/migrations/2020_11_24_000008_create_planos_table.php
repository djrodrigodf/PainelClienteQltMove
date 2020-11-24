<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanosTable extends Migration
{
    public function up()
    {
        Schema::create('planos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('marca')->nullable();
            $table->string('ano')->nullable();
            $table->string('veiculo')->nullable();
            $table->string('km')->nullable();
            $table->string('periodo')->nullable();
            $table->decimal('r_zero', 15, 2)->nullable();
            $table->decimal('r_um', 15, 2)->nullable();
            $table->decimal('r_dois', 15, 2)->nullable();
            $table->decimal('r_tres', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
