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
        Schema::create('liberaries', function (Blueprint $table) {
            $table->id();

            $table->string('name_ar');
            $table->string('name_en');
            //slug
            $table->string('slug')->unique();
            //description
            $table->string('desc_ar');
            $table->string('desc_en');
            //image
            $table->string('media');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liberaries');
    }
};
