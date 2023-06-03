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

        Schema::create('diagnoseds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('DoctoriD')->reference('id')->on('employees');
            $table->foreignId('PatientID')->reference('id')->on('patients');
            $table->foreignId('DiseaseID')->reference('id')->on('diseases');
            $table->string('Details');
            $table->foreignId('PatientAppointmentID')->reference('id')->on('patient_appointments');
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
        Schema::dropIfExists('diagnoseds');
    }
};
