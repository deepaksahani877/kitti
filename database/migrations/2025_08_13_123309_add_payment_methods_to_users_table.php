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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->enum('preferred_payment_method', ['gateway', 'upi', 'qr'])->nullable()->after('phone');
            $table->string('bank_account_holder_name')->nullable()->after('preferred_payment_method');
            $table->string('bank_account_number')->nullable()->after('bank_account_holder_name');
            $table->string('bank_ifsc_code')->nullable()->after('bank_account_number');
            $table->string('upi_id')->nullable()->after('bank_ifsc_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'preferred_payment_method',
                'bank_account_holder_name',
                'bank_account_number',
                'bank_ifsc_code',
                'upi_id'
            ]);
        });
    }
};
