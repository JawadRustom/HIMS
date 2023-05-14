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

        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->reference('id')->on('users');
            $table->foreignId('EmployeeTypeId')->reference('id')->on('employee_types');
            $table->string('NationalNumber');
            $table->foreignId('DepartmentID')->constrained('departments')->uniqid();
            $table->string('Address')->nullable();
            $table->timestamp('HairDate');
            $table->string('Gender');
            $table->dateTime('BirthDate');
            $table->integer('Salary');
            $table->foreignId('ManagerID')->Reference('id')->on('employees')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
