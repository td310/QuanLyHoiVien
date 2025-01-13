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
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('club_code');
            $table->string('club_name_vn');
            $table->string('club_name_en')->nullable();
            $table->string('club_name_acronym')->nullable();
            $table->string('address');
            $table->string('tax_number');
            $table->string('phone');
            $table->string('email');
            $table->string('website');
            $table->string('fanpage');
            $table->string('date');
            $table->string('decision');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('major_id');
            $table->integer('feild_id');
            $table->integer('market_id');
            $table->integer('connection_manager_id');
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
