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
        Schema::create('tbl_Cars', function (Blueprint $table) {
        $table->id('CarID');
        $table->string('CarName', 100)->nullable();
        $table->integer('Seat')->nullable();
        $table->string('LicensePlate', 20)->nullable();
        $table->decimal('Price', 18, 2)->nullable();
        $table->string('Color', 50)->nullable();
        $table->integer('Model')->nullable();
        $table->float('Rate')->nullable();
        $table->string('CarBrand', 50)->nullable();
        $table->text('Image')->nullable();
        $table->decimal('SalePrice', 18, 2)->nullable();
        $table->string('Alias', 50)->nullable();
        $table->boolean('IsSale');
        $table->boolean('IsActive');
        $table->text('Details')->nullable();
        $table->text('Descriptions')->nullable();
        $table->unsignedBigInteger('TypeID')->nullable();

        // Foreign key liên kết với bảng CarTypes
        $table->foreign('TypeID')->references('TypeID')->on('tbl_CarTypes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_Cars');
    }
};
