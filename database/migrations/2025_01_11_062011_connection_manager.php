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
        Schema::create('connection_managers', function (Blueprint $table) {
            $table->id();
            $table->string('connection_manager_name');
            $table->string('position');
            $table->string('phone');
            $table->string('gender');
            $table->string('email_connection');
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
