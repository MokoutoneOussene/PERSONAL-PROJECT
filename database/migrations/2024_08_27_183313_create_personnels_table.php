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
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->string('matricule')->nullable();
            $table->string('num_secu_social');
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_nais');
            $table->string('residence')->nullable();
            $table->string('genre');
            $table->date('date_embauche');
            $table->string('categorie');
            $table->string('telephone')->nullable();
            $table->string('grou_sang')->nullable();
            $table->string('pere')->nullable();
            $table->string('mere')->nullable();
            $table->string('perso_prevenir')->nullable();
            $table->string('tele_perso_prevenir')->nullable();
            $table->string('lieunais')->nullable();
            $table->string('province')->nullable();
            $table->string('matrimoniale')->nullable();
            $table->string('fonction')->nullable();
            $table->string('email')->nullable();
            $table->string('num_cnib')->nullable();
            $table->date('date_cnib');
            $table->string('lieu_cnib');
            $table->string('nbre_enfant');
            $table->string('charge_uts');
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnels');
    }
};
