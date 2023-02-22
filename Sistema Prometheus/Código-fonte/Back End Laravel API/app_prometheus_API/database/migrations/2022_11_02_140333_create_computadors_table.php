<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computadores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gabinete_id');
            $table->unsignedBigInteger('fonte_de_energia_id');
            $table->unsignedBigInteger('armazenamento_id');
            $table->unsignedBigInteger('placa_mae_id');
            $table->unsignedBigInteger('processador_id');
            $table->decimal('preco_montagem', 8, 2);
            $table->boolean('compatibilidade');
            $table->timestamps();
            $table->softDeletes();
            
            //constraint
            $table->foreign('gabinete_id')->references('id')->on('gabinetes');
            $table->foreign('fonte_de_energia_id')->references('id')->on('fontes_de_energia');
            $table->foreign('armazenamento_id')->references('id')->on('armazenamentos');
            $table->foreign('placa_mae_id')->references('id')->on('placas_mae');
            $table->foreign('processador_id')->references('id')->on('processadores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('computadores', function(Blueprint $table){
            $table->dropForeign('computadores_gabinete_id_foreign');
            $table->dropForeign('computadores_fonte_de_energia_id_foreign');
            $table->dropForeign('computadores_armazenamento_id_foreign');
            $table->dropForeign('computadores_placa_mae_id_foreign');
            $table->dropForeign('computadores_processador_id_foreign');
            $table->dropColumn('gabinete_id');
            $table->dropColumn('fonte_de_energia_id');
            $table->dropColumn('armazenamento_id');
            $table->dropColumn('placa_mae_id');
            $table->dropColumn('processador_id');
        });

        Schema::dropIfExists('computadores');
    }
}
