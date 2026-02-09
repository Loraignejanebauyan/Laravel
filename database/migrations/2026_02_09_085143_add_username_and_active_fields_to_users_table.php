<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->after('id'); // Make it nullable initially
            $table->boolean('is_active')->default(true)->after('password');
            $table->timestamp('last_login')->nullable()->after('is_active');
        });
        
        // Now update existing records with a default username and make the column non-nullable
        DB::statement("UPDATE users SET username = 'user_' || id WHERE username IS NULL");
        
        // Make the username column non-nullable and unique
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable(false)->change();
            $table->unique('username');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['username']); // Drop the unique constraint first
            $table->dropColumn(['username', 'is_active', 'last_login']);
        });
    }
};
