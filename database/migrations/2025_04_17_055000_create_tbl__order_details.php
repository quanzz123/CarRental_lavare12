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
        Schema::create('tbl_OrderDetails', function (Blueprint $table) {
            $table->id('OrderDetailID'); // Auto-incrementing primary key
            $table->unsignedBigInteger('OrderID')->nullable();
            $table->unsignedBigInteger('CarID');
            $table->text('Description')->nullable(); // For nvarchar(max)
            $table->decimal('Price', 18, 2)->nullable();
            $table->integer('Quantity')->nullable();
            $table->dateTime('PickupDate')->nullable();
            $table->dateTime('ReturnDate')->nullable();
            
            // Foreign key constraints
            $table->foreign('OrderID')->references('OrderID')->on('tbl_CarRentailOrders')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_OrderDetails');
    }
};
