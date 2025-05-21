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
        Schema::create('tblContracDetails', function (Blueprint $table) {
            $table->id('ContractDetailID'); // Auto-incrementing primary key
            $table->unsignedBigInteger('ContractID')->nullable();
            $table->unsignedBigInteger('TypeID')->nullable();
            $table->integer('Quantity')->nullable();
            $table->decimal('Price', 18, 2)->nullable();
            $table->date('ReceiveDate')->nullable();
            $table->date('ReturnDate')->nullable();
            $table->text('Notes')->nullable(); // For nvarchar(max)
            
            // Foreign key constraints
            $table->foreign('ContractID')
                  ->references('ContractID')
                  ->on('tbl_Contract')
                  ->onDelete('set null');
            
            $table->foreign('TypeID')
                  ->references('TypeID')
                  ->on('tbl_CarTypes') // Assuming you have a CarTypes table
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblContracDetails');
    }
};
