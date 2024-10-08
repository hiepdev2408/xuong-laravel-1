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
        Schema::create('financial__reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('month');
            $table->unsignedBigInteger('year');
            $table->unsignedBigInteger('total_sales');
            $table->unsignedBigInteger('total_expense');
            $table->unsignedBigInteger('profit_before_tax');
            $table->unsignedBigInteger('tax_amount');
            $table->unsignedBigInteger('profit_after_tax');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial__reports');
    }
};
