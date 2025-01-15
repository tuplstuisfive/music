<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('music', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->unsignedBigInteger('artist_id');
            $table->foreign('artist_id')->references('id')->on('artists')->cascadeOnDelete();
            $table->unsignedBigInteger('album_id')->nullable();
            $table->foreign('album_id')->references('id')->on('albums')->nullOnDelete();
            $table->string('name');
            $table->string('audio')->nullable();
            $table->unsignedBigInteger('viewed')->default(0);
            $table->unsignedBigInteger('favorites')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('music');
    }
};
