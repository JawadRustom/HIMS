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

        Schema::create('work_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('EmployeeID')->reference('id')->on('employees');
            $table->foreignId('RoomID')->reference('id')->on('rooms');
            $table->time('FromHour');
            $table->time('ToHour');
            $table->timestamp('WorkDayName');
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
        Schema::dropIfExists('work_schedules');
    }
};
