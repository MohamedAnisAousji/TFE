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
        Schema::create('evenements', function (Blueprint $table) {
            $table->id('id_Event');
            $table->timestamps();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('capacite');
            $table->string('status',200);
            $table->string('nom_societe',200);
            $table->string('email',200);
            $table->text('formule_demande');
            $table->foreignId("client_id");
            
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('restrict')->onUpdate('cascade');







        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
