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
            $table->foreignId('PatientID')->reference('id')->on('patients');
            $table->foreignId('AnalysisID')->reference('id')->on('analysis');
            $table->timestamp('AnalysisDate');
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
