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
        Schema::create('customer_corporates', function (Blueprint $table) {
            $table->id();
            $table->string('id_login');
            $table->string('id_card');
            $table->string('company_vn');
            $table->string('company_en')->nullable();
            $table->string('company_acronym')->nullable();
            $table->string('main_address');
            $table->string('office_address');
            $table->string('tax_number');
            $table->string('phone');
            $table->string('website');
            $table->string('fanpage');
            $table->string('date_of_establishment');
            $table->string('charter_capital');
            $table->string('revenue');
            $table->string('email');
            $table->enum('size_company', ['50-100', '101-200', '201-500', '>500']);
            $table->string('prize');
            $table->string('award_certificate');
            $table->string('status');
            $table->integer('major_id');
            $table->integer('feild_id');
            $table->integer('market_id');
            $table->integer('target_customer_id');
            $table->integer('certificate_id');
            $table->integer('connection_manager_id');
            $table->integer('club_id');
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
