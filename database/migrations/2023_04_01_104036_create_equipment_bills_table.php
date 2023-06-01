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

        Schema::create('equipment_bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('EmployeeID')->reference('id')->on('employees');
            $table->foreignId('EquipmentID')->reference('id')->on('equipment');
            $table->timestamp('BillDate');
            $table->integer('Quantity');
            $table->integer('Price');
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
        Schema::dropIfExists('equipment_bills');
    }
};
