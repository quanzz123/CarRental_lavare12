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
        Schema::create('tbl_BlogComment', function (Blueprint $table) {
            $table->id('CommentID');
            $table->string('Name', 50)->nullable();
            $table->string('Phone', 50)->nullable();
            $table->string('Email', 50)->nullable();
            $table->dateTime('CreatedDate')->nullable();
            $table->string('Detail', 200)->nullable();
            $table->unsignedBigInteger('BlogID')->nullable();
            $table->boolean('IsActive')->default(false);
            $table->timestamps();

            //fk
            $table->foreign('BlogID')->references("BlogID")->on('tbl_Blog')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_BlogComment');
    }
};
