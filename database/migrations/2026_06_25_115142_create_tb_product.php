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
            $table->id("Product_Id");
            $table->unsignedBigInteger("Category_Id");
            $table->foreign("Category_Id")
                ->references("Category_Id")
                ->on("tb_category")
                ->onDelete("cascade");
            $table->integer("Product_Price");
            $table->string("Product_Image");
            $table->string("Product_Name");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_product');
    }
};
