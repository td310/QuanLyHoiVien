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
        Schema::create('partner', function (Blueprint $table) {
            $table->id();
            $table->string('id_login');
            $table->string('id_card');
            $table->string('company_vn');
            $table->string('company_en')->nullable();
            $table->string('company_acronym')->nullable();
            $table->enum('nation', ['vietnam', 'national'])->default('vietnam');
            $table->string('main_address');
            $table->string('office_address');
            $table->string('tax_number');
            $table->string('website');
            $table->string('phone');
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
