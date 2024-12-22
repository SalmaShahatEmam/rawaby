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
        Schema::table('projects', function (Blueprint $table) {
           /*  $table->string('name_ar');
            $table->string('name_en');
            //slug
            $table->string('slug')->unique();
            //description
            $table->string('desc_ar');
            $table->string('desc_en');
            //image
            $table->string('image'); */
            $table->longText('feature_ar');
            $table->longText('feature_en');

            $table->longText('applications_ar');
            $table->longText('applications_en');

            $table->longText('advantages_ar');
            $table->longText('advantages_en');

          //  $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
};
