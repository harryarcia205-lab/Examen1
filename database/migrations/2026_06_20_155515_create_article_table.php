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
        Schema::create('article', function (Blueprint $table) {
            $table->increments("id");
            $table->string("internal_code", 50);
            $table->string("detailed_description", 25);
            $table->decimal("current_selling_price", 12);
            $table->decimal("average_purchase_cost", 12);
            $table->string("availability_status", 20);
            $table->date("entry_date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article');
    }
};
