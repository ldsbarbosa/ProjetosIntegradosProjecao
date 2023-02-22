<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFonteDeEnergiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fontes_de_energia', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 200);
            $table->string('marca', 200);
            $table->decimal('preco', 8, 2);
            $table->integer('potencia'); // Potência em Watts
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
        Schema::dropIfExists('fontes_de_energia');
    }
}
