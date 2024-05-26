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
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('school');
            $table->string('locationSchool')->nullable();
            $table->string('startMonthSchool');
            $table->integer('startYearSchool');
            $table->string('endMonthSchool')->nullable();
            $table->integer('endYearSchool')->nullable();
            $table->string('isActiveEducation')->nullable();
            $table->string('lastEdu')->nullable();
            $table->string('major')->nullable();
            $table->float('ipk')->nullable();
            $table->text('activity')->nullable();
            $table->text('linkSertif')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan');
    }
};
