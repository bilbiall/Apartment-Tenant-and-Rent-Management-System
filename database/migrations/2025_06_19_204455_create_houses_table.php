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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->id(); // auto-incremented primary key
            $table->string('house_name');
            $table->unsignedInteger('number_of_rooms')->default(1);
            $table->double('rent_amount', 10, 2);
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            $table->string('num_of_bedrooms');
            $table->string('house_status')->default('Vacant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
