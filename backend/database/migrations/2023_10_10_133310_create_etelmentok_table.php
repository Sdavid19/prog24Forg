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
        Schema::create('etelmento', function (Blueprint $table) {
            $table->id();
            $table->string('nev', 100);
            $table->string('emailCim', 100)->nullable();
            $table->string('jelszo', 100);
            $table->double('longitude', 50);
            $table->double('latitude', 50);
            $table->string('szuletesiHely')->nullable();
            $table->date('szuletesiDatum')->nullable();
            $table->boolean('mogyoroAllergia');
            $table->boolean('halAllergia');
            $table->boolean('tojasAllergia');
            $table->boolean('szojaAllergia');
            $table->boolean('laktozErzekenyseg');
            $table->boolean('glutenErzekenyseg');
            $table->boolean('olaszKonyha');
            $table->boolean('gorogKonyha');
            $table->boolean('amerikaiKonyha');
            $table->boolean('mexikoiKonyha');
            $table->boolean('magyarKonyha');
            $table->boolean('japanKonyha');
            $table->boolean('szimplaEtrend');
            $table->boolean('vegetarianusEtrend');
            $table->boolean('veganEtrend');
            $table->integer('diabetesz')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etelmento');
    }
};
