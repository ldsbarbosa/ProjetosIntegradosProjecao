<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoriaRAMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memorias_ram', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 200);
            $table->string('marca', 200);
            $table->decimal('preco', 8, 2);
            $table->integer('capacidade'); // Capacidade em GB
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
        Schema::dropIfExists('memorias_ram');
    }
}
