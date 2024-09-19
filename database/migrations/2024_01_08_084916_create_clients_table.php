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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Nom_Parent', 100)->nullable;
            $table->string('Prenom_Parent',100 )->nullable;
            $table->boolean('Genre');
            $table->string('Email',100)->nullable;
            $table->boolean('Envoi_Email')->nullable;
            $table->string('password');
            $table->rememberToken();
            $table->boolean('Actif')->default('0');
            $table->string('stripe_id')->nullable();
            $table->string('pm_type')->nullable(); 
            $table->string('pm_last_four')->nullable();


            



        
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
         //Schema::table('clients', function (Blueprint $table) {
          //$table->dropColumn('Actif'); // Supprime le champ si la migration est annulée
        // });
    }



};
