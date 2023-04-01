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

        Schema::create('patient_analysis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('PatientID')->constrained('patients')->unique();
            $table->foreignId('AnalysisID')->constrained('analysis')->unique();
            $table->date('AnalysisDate');
            $table->string('AnalysisRatio');
            $table->string('AnalysisResult');
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
        Schema::dropIfExists('patient_analysis');
    }
};
