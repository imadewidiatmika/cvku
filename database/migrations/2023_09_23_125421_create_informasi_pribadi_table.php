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
        Schema::create('informasi_pribadi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('phoneNum');
            $table->string('email');
            $table->string('profesion')->nullable();
            $table->string('linked')->nullable();
            $table->string('portfolio')->nullable();
            $table->string('address')->nullable();
            $table->text('desc');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_pribadi');
    }
};
