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
        Schema::create('calendars', function (Blueprint $table) {
            $table->id();
            $table->string('host');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('location');
            $table->string('date');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('customer_login_id');
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
