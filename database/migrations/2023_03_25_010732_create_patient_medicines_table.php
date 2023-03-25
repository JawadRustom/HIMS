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

        Schema::create('patient_medicines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('MedicineID')->constrained('medicines')->unique();
            $table->foreignId('DiagnosedID')->constrained('diagnoseds')->unique();
            $table->integer('MedicineCaliber');
            $table->integer('DosagePerDay');
            $table->integer('DaysCount');
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
        Schema::dropIfExists('patient_medicines');
    }
};
