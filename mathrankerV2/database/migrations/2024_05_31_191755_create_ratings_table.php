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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->string('uname');
            $table->unsignedBigInteger('c_id');  // Use the correct data type for the foreign key
            $table->integer('rating');
            $table->foreign('uname')->references('uname')->on('solvers')->onDelete('cascade');
            $table->foreign('c_id')->references('id')->on('contests')->onDelete('cascade');  // Correct foreign key reference
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};

