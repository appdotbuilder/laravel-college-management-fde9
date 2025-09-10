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
        Schema::create('fee_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Fee type name');
            $table->enum('category', ['tuition', 'hostel', 'transport', 'registration', 'others'])->comment('Fee category');
            $table->enum('frequency', ['one_time', 'monthly', 'semester'])->comment('Payment frequency');
            $table->decimal('amount_default', 10, 2)->comment('Default fee amount');
            $table->timestamps();

            $table->index('category');
            $table->index('frequency');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_types');
    }
};