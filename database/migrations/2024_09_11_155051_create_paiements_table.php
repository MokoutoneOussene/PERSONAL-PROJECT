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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->date('date')->nullable();
            $table->string('periode_paie')->nullable();
            $table->string('mode_paie')->nullable();
            $table->string('annee_paie')->nullable();

            $table->decimal('occasionnelle')->nullable();
            $table->decimal('precompte')->nullable();
            $table->decimal('autres_retenu')->nullable();

            $table->decimal('avoir')->nullable();
            $table->decimal('retenu')->nullable();
            
            $table->decimal('salaire_total')->nullable();
            
            $table->foreignId('contrats_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('istitut_banks_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
