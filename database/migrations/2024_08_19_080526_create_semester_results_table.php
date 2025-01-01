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
        Schema::create('semester_results', function (Blueprint $table) {
            $table->id();
            $table->integer('semester_no');
            $table->boolean('semester_type'); // [1 => fall, 0 => spring]
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete()->cascadeOnUpdate();
            $table->float('gpa');
            $table->integer('total_courses');
            $table->integer('total_credit_earned');
            $table->boolean('status'); // promoted or fail
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semester_results');
    }
};
