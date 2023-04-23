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

        Schema::create('patient_symptoms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('PatientID')->constrained('patients');
            $table->foreignId('SymptomID')->constrained('symptoms');
            $table->timestamp('SymptomDate');
            $table->string('Description');
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
        Schema::dropIfExists('patient_symptoms');
    }
};
