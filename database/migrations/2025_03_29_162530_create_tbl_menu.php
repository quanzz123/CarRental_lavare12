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
        Schema::create('tbl_Menus', function (Blueprint $table) {
            $table->id();
            $table->string('Title');

            $table->string('Alias');

            $table->string('Description');

            $table->integer('Levels');

            $table->integer('Position');
            $table->boolean("Isactive");
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_Menus');
    }
};
