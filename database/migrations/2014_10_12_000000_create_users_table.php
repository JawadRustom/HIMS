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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('UserTypeId')->constrained('user_types');
            //$table->foreignId('UserTypeId')->references('id')->on('user_types');
            //$table->bigInteger('UserTypeId')->unsigned();$table->foreign('UserTypeId')->references('id')->on('user_types');
            $table->string('NickName');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('PhoneNumber');
            $table->string('Country')->nullable();
            $table->string('City')->nullable();
            $table->string('ProfileImage')->nullable();
            $table->string('icon')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
