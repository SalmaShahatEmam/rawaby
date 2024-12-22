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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('slug')->unique();
            $table->string('desc_ar');
            $table->string('desc_en');
            $table->string('image');

            $table->string("address")->nullable();
        
            $table->string('power');
            $table->string('time');


            $table->longText('products_en');
            $table->longText('products_ar');

            $table->longText('feature_en');
            $table->longText('feature_ar');

            $table->longText('targets_en');
            $table->longText('targets_ar');

            $table->softDeletes();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
