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
            $table->id('id_Reservation');
            $table->timestamps();
            $table->date('Date');
            $table->time('heure_resrv');
            $table->foreignId("client_id");
            




             $table->foreign('client_id')->references('id')->on('clients')->onDelete('restrict')->onUpdate('cascade');
         






        

            




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
