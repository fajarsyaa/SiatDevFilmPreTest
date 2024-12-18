<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('film', function (Blueprint $table) {
            $table->id('id_film');
            $table->string('judul', 255);
            $table->string('publisher', 255);
            $table->text('sinopsis');
            $table->integer('durasi');
            $table->year('tahun_rilis')->nullable();
            $table->unsignedBigInteger('id_kategori')->nullable();
            $table->string('path_video', 255)->nullable();
            $table->string('path_thumbnail', 255)->nullable();
            $table->timestamps();

            $table->foreign('id_kategori')
                  ->references('id_kategori')
                  ->on('kategori')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film');
    }
};
