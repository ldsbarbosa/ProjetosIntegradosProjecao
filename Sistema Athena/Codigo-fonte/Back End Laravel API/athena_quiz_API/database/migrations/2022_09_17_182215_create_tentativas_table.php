<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTentativasTable extends Migration
{
    public function up()
    {
        Schema::create('tentativas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('pergunta_id');
            $table->boolean('tentativa');
            $table->timestamps();
            $table->softDeletes();

            //constraint
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('pergunta_id')->references('id')->on('perguntas');
        });
    }

    public function down()
    {
        Schema::table('provas', function(Blueprint $table){
            $table->dropForeign('tentativas_usuario_id_foreign');
            $table->dropForeign('tentativas_pergunta_id_foreign');
            $table->dropColumn('usuario_id');
            $table->dropColumn('pergunta_id');
        });
        
        Schema::dropIfExists('tentativas');
    }
}
