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
        Schema::create('tbl_Customer', function (Blueprint $table) {
            $table->id('CustomerID');
            $table->string('FullName', 50)->nullable();
            $table->string('Name', 100)->nullable();
            $table->string('Password', 50)->nullable();
            $table->string('Email', 50)->nullable();
            $table->dateTime('DateofBirth')->nullable();
            $table->text('Address')->nullable(); // For nvarchar(max)
            $table->string('LicenseNumber', 50)->nullable();
            $table->text('LicenseImage')->nullable(); // For nvarchar(max)
            $table->string('IDCard', 20)->nullable();
            $table->string('PhoneNumber', 20)->nullable();
            $table->string('AccountNumber', 50)->nullable();
            $table->string('Bank', 50)->nullable();
            $table->string('CompanyName', 100)->nullable();
            $table->string('Avartar', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_Customer');
    }
};
