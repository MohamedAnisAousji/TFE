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
        Schema::create('formules', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nom_formule',100);
            $table->string('desc_formule',200);
            $table->float('Montant');
            $table->foreignId("client_id");

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('restrict')->onUpdate('cascade');




        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formules');
    }
};
