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
        Schema::create('favorites', function (Blueprint $table) {
            $table->foreignId('id_user')->constrained('users', 'id_user')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_sushi')->constrained('sushi', 'id_sushi')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_drink')->constrained('drinkables', 'id_drink')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_dessert')->constrained('dessert', 'id_dessert')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
