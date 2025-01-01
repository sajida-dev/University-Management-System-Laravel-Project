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
        Schema::create('academic_qualifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('degree_level');
            $table->foreignId('board_id')->nullable()->constrained('boards')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('university_id')->nullable()->constrained('universities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('registration_no');
            $table->string('roll_no');
            $table->integer('passing_year');
            $table->boolean('exam_type');
            $table->float('total_marks');
            $table->float('obtained_marks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_qualifications');
    }
};
