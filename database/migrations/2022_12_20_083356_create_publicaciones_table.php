<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id();
            //foreign key usuario_id on cascade
            $table->foreignId('usuario_id')->constrained()->cascadeOnDelete();
            //titulo varchar 50
            $table->string('titulo', 50);
            //publicacion varchar 250
            $table->string('publicacion', 250);
            //fecha date
            $table->date('fecha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicaciones');
    }
};
