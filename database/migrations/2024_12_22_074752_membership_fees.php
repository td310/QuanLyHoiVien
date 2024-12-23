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
        Schema::create('memebership_fees', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('description');
            $table->string('attachment');
            $table->string('debt');
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid');
            $table->integer('committee_id');
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
