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

        Schema::create('patients_operations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('PatientID')->reference('id')->on('patients');
            $table->foreignId('DoctorID')->reference('id')->on('employees');
            $table->foreignId('AnesthesiologistID')->reference('id')->on('employees');
            $table->foreignId('OperationID')->reference('id')->on('operations');
            $table->timestamp('OperationDate');
            $table->integer('DoctorCommission');
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
        Schema::dropIfExists('patients_operations');
    }
};
