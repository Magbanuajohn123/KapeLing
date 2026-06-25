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
        Schema::create('tb_product', function (Blueprint $table) {
            $table->id('Product_Id');
            $table->unsignedBigInteger('Category_Id');
            $table->foreign('Category_Id')
            ->references('Category_Id')#this is the primary key on tb_category
            ->on('tb_category')
            ->onDelete('cascade');
            $table->string('Product_Name');
            $table->string('Product_Image');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
