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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('id_no')->unique()->comment('Student ID number');
            $table->string('matric_no')->nullable()->unique()->comment('Matriculation number');
            $table->string('phone')->comment('Student phone number');
            $table->text('address')->nullable()->comment('Student address');
            $table->string('guardian_name')->nullable()->comment('Guardian name');
            $table->string('guardian_phone')->nullable()->comment('Guardian phone number');
            $table->timestamps();

            $table->index('id_no');
            $table->index('matric_no');
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