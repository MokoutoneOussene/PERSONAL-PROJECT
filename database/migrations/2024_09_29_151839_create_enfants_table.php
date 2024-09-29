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
        Schema::create('enfants', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->date('date_nais')->nullable();
            $table->string('lieu_nais')->nullable();
            $table->string('genre')->nullable();
            $table->string('nom_conj')->nullable();
            $table->string('prenom_conj')->nullable();
            $table->string('profession')->nullable();
            $table->string('adresse')->nullable();
            $table->string('acte_nais')->nullable();
            $table->foreignId('personnels_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enfants');
    }
};
