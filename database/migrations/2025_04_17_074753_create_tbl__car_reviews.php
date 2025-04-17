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
        Schema::create('tbl_CarReviews', function (Blueprint $table) {
            $table->id('CarReviewID'); // Auto-incrementing primary key
            $table->string('Name', 50)->nullable();
            $table->string('Phone', 50)->nullable();
            $table->string('Email', 50)->nullable();
            $table->dateTime('CreatedDate')->nullable();
            $table->string('Detail', 200)->nullable();
            $table->unsignedBigInteger('CarID')->nullable();
            $table->integer('Star')->nullable();
            $table->boolean('IsActive')->nullable();
            
            
            $table->foreign('CarID')->references('CarID')->on('tbl_Cars')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_CarReviews');
    }
};
