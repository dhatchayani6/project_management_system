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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('regno')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('project_title');
            $table->text('project_description');
            $table->string('mentor_name');
            $table->string('mentor_number');
            $table->string('student_mobile');
            $table->string('batch_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
