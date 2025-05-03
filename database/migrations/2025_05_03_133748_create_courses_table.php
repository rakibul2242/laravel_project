<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., Introduction to Programming
            $table->string('code')->unique(); // e.g., CSE101
            $table->text('description')->nullable(); // Optional course description
            $table->integer('credit_hours'); // e.g., 3
            $table->string('semester')->nullable(); // e.g., Fall 2025
            $table->enum('level', ['Undergraduate', 'Postgraduate'])->default('Undergraduate');
            $table->string('department')->nullable(); // e.g., Computer Science
            $table->unsignedBigInteger('teacher_id')->nullable(); // Relation to teachers table

            $table->timestamps();

            // Foreign key constraint (optional, if you have teachers table)
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
