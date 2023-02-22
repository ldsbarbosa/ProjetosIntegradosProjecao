<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpcaosTable extends Migration
{
    public function up()
    {
        Schema::create('opcoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pergunta_id');
            $table->text('nome_opcao');
            $table->timestamps();
            $table->softDeletes();

            //constraint
            $table->foreign('pergunta_id')->references('id')->on('perguntas');
        });
    }

    public function down()
    {
        Schema::table('provas', function(Blueprint $table){
            $table->dropForeign('opcoes_pergunta_id_foreign');
            $table->dropColumn('pergunta_id');
        });
        Schema::dropIfExists('opcoes');
    }
}
