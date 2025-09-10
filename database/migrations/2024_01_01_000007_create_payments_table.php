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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 10, 2)->comment('Payment amount');
            $table->enum('method', ['cash', 'bank_transfer', 'online'])->comment('Payment method');
            $table->enum('status', ['pending', 'paid', 'failed'])->default('pending')->comment('Payment status');
            $table->date('payment_date')->comment('Payment date');
            $table->string('receipt_number')->unique()->comment('Unique receipt number');
            $table->foreignId('received_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();

            $table->index(['student_id', 'status']);
            $table->index('payment_date');
            $table->index('receipt_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};