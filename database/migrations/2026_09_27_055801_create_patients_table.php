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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('membership_tier')->default('Non-Member');
            $table->date('join_date')->nullable();
            $table->integer('total_visits')->default(0);
            $table->decimal('total_spent', 15, 2)->default(0);
            $table->text('allergies')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->date('last_visit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
