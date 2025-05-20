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
        Schema::create('tblSLider', function (Blueprint $table) {
            $table->id("SlideId");
            $table->string("SliderName");
            $table->string("Sliderdecs");
            $table->boolean('Isactive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblSLider');
    }
};
