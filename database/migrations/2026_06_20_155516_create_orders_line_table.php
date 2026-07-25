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
        Schema::create('orders_line', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("article_id")->unsigned();
            $table->foreign("article_id")->on("id")->references("articles")->onDelete("cascade")->onUpdate("cascade");
            $table->integer("requested_quiantity");
            $table->decimal("unit_price", 12,2);
            $table->decimal("line_subtotal", 12,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_line');
    }
};
