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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('movie_image');
            $table->date('release');
            $table->integer('rating');
            $table->string('trailer_link');
            $table->softDeletes('deleted_at', 0);
            $table->foreignId('admin_id');
            $table->foreignId('type_id');
            $table->foreignId('production_id');
            $table->foreignId('director_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
