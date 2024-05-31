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
        Schema::create('solvers', function (Blueprint $table) {
            $table->string('uname')->primary();
            $table->string('fname', 100);
            $table->string('lname', 100);
            $table->string('email', 255)->unique();
            $table->string('institution', 255);
            $table->string('city', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('password');
            $table->rememberToken()->nullable();
            $table->string('role')->default('solver');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solvers');
    }
};
