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
        Schema::create('tbl_Contact', function (Blueprint $table) {
            $table->id('ContactID');
            $table->string('Name', 150)->nullable();
            $table->string('Phone', 50)->nullable();
            $table->string('Email', 150)->nullable();
            $table->text('Message')->nullable(); // Equivalent to NVARCHAR(MAX)
            $table->integer('IsRead')->nullable();
            $table->dateTime('CreatedDate')->nullable();
            $table->string('CreatedBy', 150)->nullable();
            $table->dateTime('ModifiedDate')->nullable();
            $table->string('ModifiedBy', 150)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_Contact');
    }
};
