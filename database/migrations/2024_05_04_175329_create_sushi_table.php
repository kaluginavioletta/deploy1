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
        Schema::create('sushi', function (Blueprint $table) {
            $table->id('id_sushi');
            $table->string('name_sushi', 255);
            $table->text('compound_sushi');
            $table->integer('price_sushi');
            $table->integer('discounted_price_sushi');
            $table->string('img_sushi', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sushi');
    }
};
