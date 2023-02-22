<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perguntas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prova_id');
            $table->unsignedBigInteger('disciplina_id');
            $table->text('enunciado');
            $table->string('tipo_pergunta',50);
            $table->string('resposta',50);
            $table->timestamps();
            $table->softDeletes();

            //constraint
            $table->foreign('prova_id')->references('id')->on('provas');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('provas', function(Blueprint $table){
            $table->dropForeign('perguntas_prova_id_foreign');
            $table->dropForeign('perguntas_disciplina_id_foreign');
            $table->dropColumn('prova_id');
            $table->dropColumn('disciplina_id');
        });

        Schema::dropIfExists('perguntas');
    }
}
