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
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('teacher_id')->constrained();
            $table->string('name');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('classroom_id')->nullable()->constrained();
        });
        Schema::table('lessons', function (Blueprint $table) {
            $table->foreignId('classroom_id')->nullable()->constrained();
        });
        Schema::table('teachers', function (Blueprint $table) {
            $table->foreignId('classroom_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};
