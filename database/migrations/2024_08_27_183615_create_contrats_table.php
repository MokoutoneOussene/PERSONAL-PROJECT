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
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->longText('contenu')->nullable();
            $table->string('nature')->nullable();
            $table->date('date_signature')->nullable();
            $table->string('statut')->nullable();

            $table->decimal('sal_base')->nullable();

            // Indemnités supplémentaires
            $table->decimal('prime_anciennete')->nullable();
            $table->decimal('prime_logement')->nullable();
            $table->decimal('prime_transport')->nullable();
            $table->decimal('prime_divers')->nullable();
            $table->decimal('total_indemnite')->nullable();

            //Salaire brut
            $table->decimal('salaire_brut')->nullable();

            // Retenues sur salaire
            $table->decimal('uits')->nullable();
            $table->decimal('cotisation_sociale')->nullable();
            $table->decimal('impot')->nullable();
            $table->decimal('avance_pret')->nullable();
            $table->decimal('mutuelle_payee')->nullable();
            $table->decimal('total_retenue')->nullable();

            //Salaire net à payer
            $table->decimal('sal_net')->nullable();

            $table->foreignId('personnels_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrats');
    }
};
