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
            $table->string('isVerified')->default('no');
            $table->string('username')->after('lname')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solvers', function (Blueprint $table) {
            $table->dropColumn('isVerified');
        });
    }
};
