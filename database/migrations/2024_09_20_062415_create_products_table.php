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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('Nama',100);
            $table->string('description')->nullable();
            $table->decimal('retail_price',8,2)->default(0);
            $table->decimal('wholesale-price',8,2)->default(0);
            $table->integer('min_wholesale_qty')->default(0);
            $table->integer('quantity')->default(0);
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
