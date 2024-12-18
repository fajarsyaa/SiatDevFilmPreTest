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
        Schema::create('detail_film', function (Blueprint $table) {
            $table->id('id_detail');                        
            $table->unsignedBigInteger('film_id');          
            $table->string('aktor', 255)->nullable();
            $table->string('sutradara', 255)->nullable();
            $table->decimal('rating', 3, 1)->nullable();            
            $table->timestamps();
            
            $table->foreign('film_id')
                  ->references('id_film')
                  ->on('film')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_film');
    }
};
