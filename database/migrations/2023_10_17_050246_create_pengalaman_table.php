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
        Schema::create('pengalaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('company');
            $table->string('position');
            $table->string('locationCompany');
            $table->text('descCompany')->nullable();
            $table->string('startMonthCompany');
            $table->integer('startYearCompany');
            $table->string('endMonthCompany')->nullable();
            $table->integer('endYearCompany')->nullable();
            $table->string('isActiveCompany')->nullable();
            $table->text('portfolioWork');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengalaman');
    }
};
