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
        Schema::create('tbl_News', function (Blueprint $table) {
            $table->id('NewsID');
            $table->string('Title', 250)->nullable();
            $table->string('Alias', 250)->nullable();
            $table->integer('CategoryId')->nullable();
            $table->string('Description', 4000)->nullable();
            $table->text('Detail')->nullable(); // Equivalent to NVARCHAR(MAX)
            $table->string('Image', 500)->nullable();
            $table->string('SeoTitle', 250)->nullable();
            $table->string('SeoDescription', 500)->nullable();
            $table->string('SeoKeywords', 250)->nullable();
            $table->dateTime('CreatedDate')->nullable();
            $table->string('CreatedBy', 150)->nullable();
            $table->dateTime('ModifiedDate')->nullable();
            $table->string('ModifiedBy', 150)->nullable();
            $table->boolean('IsActive')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_News');
    }
};
