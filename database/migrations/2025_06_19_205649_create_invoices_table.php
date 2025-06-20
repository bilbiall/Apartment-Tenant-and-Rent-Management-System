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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique(); // was invoiceNumber
            $table->foreignId('tenant_id')->constrained('tenants')->onDelete('cascade'); // FK to tenants
            $table->date('date_of_invoice');
            $table->date('date_due');
            $table->integer('waterbill');
            $table->integer('trash');
            $table->integer('amount_due');
            $table->integer('account_applied');
            $table->string('status')->default('unpaid');
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
