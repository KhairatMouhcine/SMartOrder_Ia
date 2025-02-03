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
            $table->string('nom'); // nom du client
            $table->time('heure'); // heure de la réservation
            $table->date('jour'); // jour de la réservation
            $table->unsignedBigInteger('id_restaurant'); // clé étrangère vers restaurant
            $table->integer('nbre_personnes'); // nombre de personnes
            $table->timestamps();
            $table->foreign('id_restaurant')
                  ->references('id')->on('restaurants')
                  ->onDelete('cascade');
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
