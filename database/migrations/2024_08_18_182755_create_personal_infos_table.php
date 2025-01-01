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

        Schema::create('personal_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('profile');
            $table->foreignId('blood_group_id')->constrained('blood_groups')->cascadeOnDelete()->cascadeOnUpdate();
            $table->boolean('marital_status')->default(false);
            $table->date('date_of_birth');
            $table->foreignId('relgion_id')->constrained('religions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('gender_id')->constrained('genders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->boolean('is_disability')->default(false);
            $table->string('father_name');
            $table->string('father_cnic');
            $table->boolean('is_father_alive')->default(true);
            $table->string('father_phone_number');
            $table->boolean('is_old_student')->default(false);
            $table->string('registration_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_infos');
    }
};
