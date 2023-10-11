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
            $table->string('típus')->nullable();
            $table->number('helybenFogyaszthato')->nullable();
            $table->boolean('mogyoroAllergia')->nullable();
            $table->boolean('halAllergia')->nullable();
            $table->boolean('tojasAllergia')->nullable();
            $table->boolean('szojaAllergia')->nullable();
            $table->string('konyhaJelleg')->nullable();
            $table->date('lejaratiDatum')->nullable();
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
