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
        Schema::create('problems', function (Blueprint $table) {
            $table->string('p_id', 100)->primary();
            $table->string('uname', 100)->references('uname')->on('solvers')->onDelete('cascade');
            $table->string('c_id', 100)->references('c_id')->on('contests')->onDelete('cascade');
            $table->string('title', 100);
            $table->string('description', 1000);
            $table->decimal('answer');
            $table->decimal('max_xp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('problems');
    }
};
