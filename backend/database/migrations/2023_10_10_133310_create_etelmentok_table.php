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
            $table->double('geolokaciosCim', 50);
            $table->integer('etrend')->nullable();
            $table->integer('konyhaPreferencia')->nullable();
            $table->integer('diabetesz')->nullable();
            $table->string('etelIntolerancia', 50)->nullable();
            $table->integer('etelAllergia')->nullable();
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
