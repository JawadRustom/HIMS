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
            $table->foreignId('PatientID')->constrained('patients');
            $table->foreignId('DoctorID')->constrained('employees');
            $table->foreignId('AnesthesiologistID')->constrained('employees');
            $table->foreignId('OperationID')->constrained('operations');
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
