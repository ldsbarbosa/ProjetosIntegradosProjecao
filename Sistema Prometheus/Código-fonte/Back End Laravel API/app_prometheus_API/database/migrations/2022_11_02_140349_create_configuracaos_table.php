<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('computador_id');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();
            $table->softDeletes();

            //constraint
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('computador_id')->references('id')->on('computadores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('configuracoes', function(Blueprint $table){
            $table->dropForeign('configuracoes_usuario_id_foreign');
            $table->dropForeign('configuracoes_computador_id_foreign');
            $table->dropColumn('usuario_id');
            $table->dropColumn('computador_id');
        });

        Schema::dropIfExists('configuracoes');
    }
}
