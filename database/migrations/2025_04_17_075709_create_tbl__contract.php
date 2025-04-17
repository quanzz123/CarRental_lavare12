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
        Schema::create('tbl_Contract', function (Blueprint $table) {
            $table->id('ContractID'); // Auto-incrementing primary key
            $table->unsignedBigInteger('CustomerID')->nullable();
            $table->date('Date')->nullable();
            $table->text('Content')->nullable(); // For nvarchar(max)
            $table->text('GeneralTerms')->nullable(); // For nvarchar(max)
            $table->text('SpecificTerms')->nullable(); // For nvarchar(max)
            $table->decimal('AdvancePayment', 18, 2)->nullable();

            $table->foreign('CustomerID')->references('CustomerID')->on('tbl_Customer')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_Contract');
    }
};
