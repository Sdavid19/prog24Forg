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
            $table->string('jelszo', 100)->nullable();
            $table->double('longitude', 50);
            $table->double('latitude', 50);
            $table->string('szuletesiHely')->nullable();
            $table->date('szuletesiDatum')->nullable();
            $table->boolean('mogyoroAllergia')->nullable();
            $table->boolean('halAllergia')->nullable();
            $table->boolean('tojasAllergia')->nullable();
            $table->boolean('szojaAllergia')->nullable();
            $table->boolean('laktozErzekenyseg')->nullable();
            $table->boolean('glutenErzekenyseg')->nullable();
            $table->boolean('olaszKonyha')->nullable();
            $table->boolean('gorogKonyha')->nullable();
            $table->boolean('amerikaiKonyha')->nullable();
            $table->boolean('mexikoiKonyha')->nullable();
            $table->boolean('magyarKonyha')->nullable();
            $table->boolean('japanKonyha')->nullable();
            $table->boolean('szimplaEtrend')->nullable();
            $table->boolean('vegetarianusEtrend')->nullable();
            $table->boolean('veganEtrend')->nullable();
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
