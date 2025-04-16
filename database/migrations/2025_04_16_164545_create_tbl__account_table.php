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
        Schema::create('tbl_Account', function (Blueprint $table) {
            $table->id("AccountID");
            $table->string("UserName",100)->nullable();
            $table->string("PassWord",100)->nullable();
            $table->string("FullName",100)->nullable();
            $table->string("Phone",11)->nullable();
            $table->string("Email",100)->nullable();
            $table->unsignedBigInteger("RoleID")->nullable();
            $table->boolean("IsActive")->nullable();
            $table->timestamps();

            //FK
            $table->foreign('RoleID')->references("RoleID")->on('tbl_Role')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_Account');
    }
};
