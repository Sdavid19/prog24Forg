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
        Schema::create('etelmentok', function (Blueprint $table) {
            $table->id();
            $table->string('nev', 100);
            $table->string('email', 100);
            $table->string('jelszo', 100);
            $table->double('geolokaciosCim', 50);
            $table->string('etelIntolerancia', 50);
            $table->integer('etelAllergia');
            $table->integer('diabetesz');
            $table->string('konyhapreferencia', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etelmentok');
    }
};
