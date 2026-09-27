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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained('transactions')->cascadeOnDelete();
            $table->string('item_type'); // 'Treatment' or 'Product' or 'Package'
            $table->unsignedBigInteger('item_id'); // foreign id morph
            $table->integer('quantity')->default(1);
            $table->decimal('price', 15, 2);
            $table->decimal('subtotal', 15, 2);
            $table->foreignId('staff_id')->nullable()->constrained('staff')->nullOnDelete(); // Commission earner
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
