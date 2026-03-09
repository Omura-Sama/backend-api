<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('tenant_id')->nullable()->after('id');
            // Jika akan direlasikan ke tabel tenants
            // $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
        });

        // Spatie's create_permission_tables migration dynamically adds the team
        // foreign key ('tenant_id') to its tables if config('permission.teams') is true.
        // Therefore, we only need to add tenant_id to the users table here.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('tenant_id');
        });
    }
};
