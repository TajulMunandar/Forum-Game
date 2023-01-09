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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori')->constrained('kategoris')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('id_user')->constrained('users')->onUpdate('cascade')->onDelete('restrict');
            $table->string('name_game');
            $table->integer('harga');
            $table->text('keterangan');
            $table->text('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game');
    }
};
