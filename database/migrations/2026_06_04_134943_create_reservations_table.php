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
    Schema::create('reservations', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')
              ->constrained()
              ->onDelete('cascade');

        $table->string('nom');
        $table->string('email');
        $table->string('telephone');

        $table->date('date_rdv');
        $table->time('heure_rdv');

        $table->text('motif');

        $table->enum('statut', [
            'en_attente',
            'accepte',
            'refuse'
        ])->default('en_attente');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
