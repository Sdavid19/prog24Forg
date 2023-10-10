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
            $table->string('etrend', 50);
            $table->boolean('pekaru');
            $table->boolean('tejtermek');
            $table->boolean('melegitendo');
            $table->boolean('helybenFogyaszthato');
            $table->integer('etelAllergia');
            $table->integer('etelIntolerancia');
            $table->date('lejaratiIdo');
            $table->string('kepUrl', 250);
            $table->string('konyhatipus', 100);
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
