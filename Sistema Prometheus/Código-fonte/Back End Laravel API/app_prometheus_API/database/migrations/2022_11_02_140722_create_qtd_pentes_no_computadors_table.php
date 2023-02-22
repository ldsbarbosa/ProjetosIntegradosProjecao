<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQtdPentesNoComputadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qtd_pentes_no_computador', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('computador_id');
            $table->unsignedBigInteger('memoria_ram_id');
            $table->timestamps();
            $table->softDeletes();

            //constraint
            $table->foreign('computador_id')->references('id')->on('computadores');
            $table->foreign('memoria_ram_id')->references('id')->on('memorias_ram');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qtd_pentes_no_computador', function(Blueprint $table){
            $table->dropForeign('qtd_pentes_no_computador_computador_id_foreign');
            $table->dropForeign('qtd_pentes_no_computador_memoria_ram_id_foreign');
            $table->dropColumn('computador_id');
            $table->dropColumn('memoria_ram_id');
        });
        Schema::dropIfExists('qtd_pentes_no_computador');
    }
}
