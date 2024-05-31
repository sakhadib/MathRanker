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
        Schema::create('solver', function (Blueprint $table) {
            $table->string('uname', 100)->primary();
            $table->string('fname', 100);
            $table->string('lname', 100);
            $table->string('email', 255);
            $table->string('institution', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('password', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solver');
    }
};
