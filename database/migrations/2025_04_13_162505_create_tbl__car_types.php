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
        Schema::create('tbl_CarTypes', function (Blueprint $table) {
            $table->id('TypeID'); // Primary key, auto-increment
            $table->string('CarTypeName', 100);
            $table->integer('Seats');
            $table->string('Manufacturer', 100)->nullable();
            $table->string('Image', 255)->nullable();
            $table->timestamps(); // Created_at, Updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_CarTypes');
    }
};
