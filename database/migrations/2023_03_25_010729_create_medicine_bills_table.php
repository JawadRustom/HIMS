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
        Schema::disableForeignKeyConstraints();

        Schema::create('medicine_bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('MedicineID')->constrained('medicines')->unique();
            $table->foreignId('EmployeeID')->constrained('employees')->unique();
            $table->date('BillDate');
            $table->integer('Quantity');
            $table->integer('BuyPrice');
            $table->integer('SalePrice');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_bills');
    }
};
