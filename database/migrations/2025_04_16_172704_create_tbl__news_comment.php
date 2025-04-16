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
        Schema::create('tbl_NewsCommnent', function (Blueprint $table) {
            $table->id('NewsCommentID');
            $table->string('Name', 50)->nullable();
            $table->string('Phone', 50)->nullable();
            $table->string('Email', 50)->nullable();
            $table->dateTime('CreatedDate')->nullable();
            $table->string('Detail', 200)->nullable();
            $table->unsignedBigInteger('NewsID')->nullable();
            $table->boolean('isActive')->nullable();
            $table->timestamps();
            //FK
            $table->foreign('NewsID')->references("NewsID")->on('tbl_News')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_NewsCommnent');
    }
};
