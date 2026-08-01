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
        Schema::create('shipping_address', function (Blueprint $table) {
            $table->increments("id");
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
            $table->string('client', 100);
            $table->integer("number")->unique();
            $table->string("street", 255);
            $table->string("neighborhood", 255);
            $table->string("city", 255);
            $table->string("reference_location", 25);
            $table->string("state_address", 25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_address');
    }
};
