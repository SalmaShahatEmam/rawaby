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
        Schema::create('estates', function (Blueprint $table) {
            $table->id();
            //stpe 1
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('personal_address');

            //step 2
            $table->string('title');
            $table->foreignId('category_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->integer('area');
            $table->integer('rooms');
            $table->integer('baths');
            $table->enum('finishing', ['deluxe','super_lux','lux','medium','simple']);
            $table->enum('type', ['sale','rent']);
            $table->text('desc');

            //step 3
            $table->foreignId('city_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('address');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();

   //
           $table->integer('price')->nullable();
            $table->enum('status', ['approved','disapproved','pending'])->default('pending');
            $table->enum('step', ['1','2','3','4'])->default('1');
            //check if the estate is uplaoded by all steps
            $table->boolean('is_completed')->default(0);
            $table->string('slug')->unique();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estates');
    }
};
