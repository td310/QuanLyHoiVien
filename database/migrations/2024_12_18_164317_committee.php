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
        Schema::create('committees', function (Blueprint $table) {
            $table->id();
            $table->string('committee_name');
            $table->string('id_card');
            $table->string('date_of_birth');
            $table->string('gender');
            $table->string('phone');
            $table->string('email');
            $table->string('unit');
            $table->string('position');
            $table->string('title');
            $table->string('term');
            $table->enum('attendance', ['present', 'absent'])->default('present');
            $table->enum('status', ['active', 'inactive'])->default('active');
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
