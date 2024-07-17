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
            $table->id('id_paiement');
            $table->timestamps();
            $table->date('date_paiementr');
            $table->float('montant_paiement');
            $table->string('paiement_type');
         

            $table->foreignId("client_id");

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('restrict')->onUpdate('cascade');


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
