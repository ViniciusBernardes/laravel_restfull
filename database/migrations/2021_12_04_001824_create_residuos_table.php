<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResiduosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residuos', function (Blueprint $table) {
            $table->increments("id");
            $table->string('nome', 300);
            $table->string('tipo', 100);
            $table->string('categoria',100);
            $table->string('tratamento',100);
            $table->string('classe',100);
            $table->string('unidade',8);
            $table->decimal('peso', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('residuos');
    }
}
