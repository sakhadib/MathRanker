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
        Schema::create('probs', function (Blueprint $table) {
            $table->string('p_id', 100)->primary();
            $table->string('c_id', 100);
            // $table->foreign('c_id')->references('c_id')->on('contests');
            $table->string('name', 255);
            $table->text('description');
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
        Schema::dropIfExists('probs');
    }
};
