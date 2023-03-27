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
            $table->foreignId('DoctoriD')->constrained('employees')->unique();
            $table->foreignId('PatientID')->constrained('patients')->unique();
            $table->foreignId('DiseaseID')->constrained('diseases')->unique();
            $table->string('Details');
            $table->foreignId('PatientAppointmentID')->constrained('patient_appointments')->unique();
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
