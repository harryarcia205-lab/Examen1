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
        Schema::create('factory', function (Blueprint $table) {
            $table->increments("id");
            $table->string("company_name", 150);
            $table->string("identification_number", 150)->unique();
            $table->string("telephone", 20)->unique();
            $table->string("email", 25)->unique();
            $table->string("physical_address");
            $table->string("supplier_status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factory');
    }
};
