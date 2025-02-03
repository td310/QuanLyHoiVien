<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('personal_customers', function (Blueprint $table) {
            $table->id();
            $table->string('personal_customer_name');
            $table->string('id_login');
            $table->string('id_card');
            $table->string('position');
            $table->string('date_of_birth');
            $table->string('gender');
            $table->string('phone');
            $table->string('email');
            $table->string('unit');
            $table->string('term');
            $table->string('status');
            $table->string('major_id');
            $table->string('field_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        //
    }
};
