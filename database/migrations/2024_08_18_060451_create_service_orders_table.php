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
        Schema::create('service_orders', function (Blueprint $table) {
            $table->id();
            $table->string('is_replay')->default(false);
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->longText('message');
            $table->morphs('requestable'); // Polymorphic relationship

            $table->string('address');
            $table->string('country');
            $table->string('company_name');
            $table->string('job_title');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_orders');
    }
};
