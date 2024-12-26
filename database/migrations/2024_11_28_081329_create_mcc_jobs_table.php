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
        Schema::create('mcc_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('section_en');
            $table->string('section_ar');

            $table->integer('hours');
            $table->string('expertise_en');
            $table->string('expertise_ar');

            $table->string('work_type_en');
            $table->string('work_type_ar');

            $table->longText('core_tasks_en');
            $table->longText('core_tasks_ar');

            $table->longText('required_skills_ar');
            $table->longText('required_skills_en');

            $table->longText('advantages_en');
            $table->longText('advantages_ar');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mcc_jobs');
    }
};
