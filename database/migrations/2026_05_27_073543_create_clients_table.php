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
        // Crea la tabella solo se non esiste
        if (!Schema::hasTable('clients')) {

            Schema::create('clients', function (Blueprint $table) {

                // ID cliente
                $table->id();

                // Nome cliente
                $table->string('name');

                // Telefono
                $table->string('phone');

                // Email
                $table->string('email')->unique();

                // Indirizzo
                $table->string('address');

                // created_at e updated_at
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
