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
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); //replaces payment id
            $table->foreignId('tenant_id')->constrained('tenants')->onDelete('cascade');
            //$table->string('invoice_number'); // we'll link this manually (not via FK unless invoices.invoice_number is also PK or unique)
            $table->foreign('invoice_number')->references('invoice_number')->on('invoices')->onDelete('cascade');
            $table->integer('expected_amount');
            $table->integer('amount_paid');
            $table->integer('balance');
            $table->string('mpesa_code', 30)->default('None');
            $table->date('date_of_payment');
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
