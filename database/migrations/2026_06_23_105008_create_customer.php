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
  Schema::create('tb_customer', function (Blueprint $table) {
           $table->id('Customer_Id');
            $table->string('Firstname');
            $table->string('Middlename');
            $table->string('Lastname');
            $table->string('Address');
            $table->string('Contact_No');
            $table->string('email');
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
