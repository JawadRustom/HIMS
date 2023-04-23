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
        Schema::create('patients', function (Blueprint $table) {
            $table->id()->foreign('users.id');
            $table->string('NationalNumber');
            $table->string('PatientStatus')->nullable();
            $table->string('Gender');
            $table->timestamp('BirthDate');
            $table->integer('PatientLength')->nullable();
            $table->integer('PatientWeight')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
