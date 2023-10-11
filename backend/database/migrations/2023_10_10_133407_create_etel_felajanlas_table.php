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
        Schema::create('etel_felajanlas', function (Blueprint $table) {
            $table->id();
            $table->string('nev', 75);
            $table->integer('mennyiseg');
            $table->string('mertekegyseg', 10);
            $table->boolean('pekaru')->nullable();
            $table->boolean('tejtermek')->nullable();
            $table->boolean('melegitendo')->nullable();
            $table->boolean('helybenFogyaszthato')->nullable();
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
            $table->boolean('veganEtrend')->nullable();;
            $table->date('lejaratiIdo')->nullable();
            $table->string('kepUrl', 250)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etel_felajanlas');
    }
};
