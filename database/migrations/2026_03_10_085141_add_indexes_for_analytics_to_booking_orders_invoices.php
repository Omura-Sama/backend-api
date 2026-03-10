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
        Schema::table('bookings', function (Blueprint $table) {
            $table->index('created_at', 'idx_bookings_created_at');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->index('created_at', 'idx_orders_created_at');
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->index('issue_date', 'idx_invoices_issue_date');
        });

        Schema::table('expenses', function (Blueprint $table) {
            $table->index('expense_date', 'idx_expenses_expense_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropIndex('idx_bookings_created_at');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex('idx_orders_created_at');
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->dropIndex('idx_invoices_issue_date');
        });

        Schema::table('expenses', function (Blueprint $table) {
            $table->dropIndex('idx_expenses_expense_date');
        });
    }
};
