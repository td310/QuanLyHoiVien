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
        Schema::create('activitys', function (Blueprint $table) {
            $table->id();
            $table->string('activity_name');
            $table->string('location');
            $table->string('description');
            $table->string('date_start');
            $table->string('date_end');
            $table->string('customer_type');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('manual_name')->nullable();
            $table->string('manual_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
