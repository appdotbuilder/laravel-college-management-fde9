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
        Schema::create('funds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->enum('sponsor_type', ['PTPTN', 'PTPK', 'MARA', 'BankLoan', 'Scholarship', 'Others'])->comment('Sponsor type');
            $table->string('sponsor_name')->nullable()->comment('Sponsor name (optional if Others)');
            $table->decimal('amount', 10, 2)->comment('Fund amount');
            $table->date('disbursement_date')->comment('Date of fund disbursement');
            $table->enum('status', ['pending', 'received', 'failed'])->default('pending')->comment('Fund status');
            $table->text('remarks')->nullable()->comment('Additional remarks');
            $table->timestamps();

            $table->index(['student_id', 'status']);
            $table->index('sponsor_type');
            $table->index('disbursement_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funds');
    }
};