<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvasTable extends Migration
{
    public function up()
    {
        Schema::create('provas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('banca_id');
            $table->string('nome', 100);
            $table->timestamps();
            $table->softDeletes();

            //constraint
            $table->foreign('banca_id')->references('id')->on('bancas');
        });
    }

    public function down()
    {
        Schema::table('provas', function(Blueprint $table){
            $table->dropForeign('provas_banca_id_foreign');
            $table->dropColumn('banca_id');
        });

        Schema::dropIfExists('provas');
    }
}
