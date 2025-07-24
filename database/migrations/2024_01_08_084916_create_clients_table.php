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
            $table->string('nom_parent', 100);
            $table->string('prenom_parent', 100);
            $table->char('genre_parent', 1);
            $table->string('email', 100)->unique();
            $table->string('mot_de_passe', 255);
            $table->boolean('envoi_mail')->default(0);
            $table->enum('type_client', ['societe', 'client ordinaire']);
            $table->string('stripe_id')->nullable();

            // Champs Stripe
            $table->string('pm_type')->nullable();        
            $table->string('pm_last_four', 4)->nullable();   

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};