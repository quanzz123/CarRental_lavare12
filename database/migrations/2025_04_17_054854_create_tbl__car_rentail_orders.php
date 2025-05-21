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
        Schema::create('tbl_CarRentailOrders', function (Blueprint $table) {
            $table->id('OrderID'); // Auto-incrementing primary key
            $table->unsignedBigInteger('CustomerID')->nullable();
            $table->date('OrderDate')->nullable();
            $table->decimal('Deposit', 18, 2)->nullable();
            $table->decimal('Payment', 18, 2)->nullable();
            $table->unsignedBigInteger('StatusID')->nullable();
            $table->date('ReturnDate')->nullable();
            $table->string('Notes', 50)->nullable();
            
            // Foreign key constraints
            $table->foreign('CustomerID')->references('CustomerID')->on('tbl_Customer')->onDelete('set null');
            $table->foreign('StatusID')->references('StatusID')->on('tbl_OrderStatus')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_CarRentailOrders');
    }
};
