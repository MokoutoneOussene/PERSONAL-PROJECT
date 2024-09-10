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
        Schema::create('personnel_missions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mission_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('personnel_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('role')->nullable();
            $table->string('task')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnel_missions');
    }
};
