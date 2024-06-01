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
        Schema::create('contest_participates', function (Blueprint $table) {
            $table->id();
            $table->string('uname');
            $table->unsignedBigInteger('contest_id');
            $table->timestamps();

            //foreign key constraint
            $table->foreign('uname')->references('uname')->on('solvers')->onDelete('cascade');
            $table->foreign('contest_id')->references('id')->on('contests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contest_participates');
    }
};
