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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name_ar');
            $table->string('name_en');
            $table->string('slug');
            $table->longText('desc_ar');
            $table->longText('desc_en');
            $table->string('image');

            $table->longText('advantages_en');
            $table->longText('advantages_ar');

            $table->longText('applications_en');
            $table->longText('applications_ar');

            $table->longText('features_en');
            $table->longText('features_ar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
