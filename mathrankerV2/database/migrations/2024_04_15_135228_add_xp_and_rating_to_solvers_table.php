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
        Schema::table('solvers', function (Blueprint $table) {
            $table->decimal('XP', 8, 2)->default(0)->nullable();
            $table->decimal('rating', 8, 2)->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solvers', function (Blueprint $table) {
            $table->dropColumn('XP');
            $table->dropColumn('rating');
        });
    }
};
