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
        Schema::create('tbl_ContractSettlements', function (Blueprint $table) {
            $table->id('SettlementID'); // Auto-incrementing primary key
            $table->unsignedBigInteger('ContractID')->nullable();
            $table->date('Date')->nullable();
            $table->string('PaymentMethod', 50)->nullable();
            $table->integer('TotalCarsRented')->nullable();
            $table->decimal('AdvancePayment', 18, 2)->nullable();
            $table->decimal('TotalPayment', 18, 2)->nullable();
            $table->decimal('PaidAmount', 18, 2)->nullable();
            $table->text('Notes')->nullable(); // For nvarchar(max)
            
            // Foreign key constraint
            $table->foreign('ContractID')
                  ->references('ContractID')
                  ->on('tbl_Contract')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_ContractSettlements');
    }
};
