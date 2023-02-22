<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGabinetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gabinetes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 200);
            $table->string('marca', 200);
            $table->decimal('preco', 8, 2);
            $table->decimal('altura', 5, 2); // Todos em milimetros
            $table->decimal('largura', 5, 2);
            $table->decimal('comprimento', 5, 2);
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
        Schema::dropIfExists('gabinetes');
    }
}
