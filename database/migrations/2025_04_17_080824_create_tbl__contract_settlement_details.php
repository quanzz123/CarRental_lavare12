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
        Schema::create('tbl_ContractSettlementDetails', function (Blueprint $table) {
            $table->id('SettlementDetailID'); // Auto-incrementing primary key
            $table->unsignedBigInteger('SettlementID')->nullable();
            $table->unsignedBigInteger('CarID');
            $table->date('ReceiveDate')->nullable();
            $table->date('ReturnDate')->nullable();
            $table->decimal('Price', 18, 2)->nullable();
            $table->decimal('Total', 18, 2)->nullable();

            //
             // Foreign key constraints
             $table->foreign('SettlementID')
             ->references('SettlementID')
             ->on('tbl_ContractSettlements')
             ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_ContractSettlementDetails');
    }
};
