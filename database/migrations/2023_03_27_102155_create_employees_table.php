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
            $table->id()->foreign('users.id');
            $table->string('NationalNumber');
            $table->foreignId('DepartmentID')->constrained('departments');
            $table->string('Address');
            $table->date('HairDate');
            $table->date('BirthDate');
            $table->string('Gender');
            $table->integer('Salary');
            $table->integer('ManagerID');
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
