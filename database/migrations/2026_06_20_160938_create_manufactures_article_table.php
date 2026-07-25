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
        Schema::create('manufactures_article', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("article_id")->unsigned();
            $table->foreign("article_id")->on("id")->references("articles")->onDelete("cascade")->onUpdate("cascade");
            $table->integer("current_stock");
            $table->decimal("supplier_negotiated_cost");
            $table->integer("estimated_delivery_time");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manufactures_article');
    }
};
