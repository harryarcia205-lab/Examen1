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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("client_id")->unsigned();
            $table->foreign("client_id")->on("id")->references("clients")->onDelete("cascade")->onUpdate("cascade");
            $table->integer("id_address")->unsigned();
            $table->foreign("id_address")->on("id")->references("address")->onDelete("cascade")->onUpdate("cascade");
            $table->datetime("date_time_creation");
            $table->decimal("subtotal", 12,2);
            $table->decimal("tax_amount", 12,2);
            $table->decimal("grand_total", 12,2);
            $table->string("additional_notes", 25);
            $table->string("order_status", 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
