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
        if (!Schema::hasTable('vehicles')) {

            Schema::create('vehicles', function (Blueprint $table) {

                // ID veicolo
                $table->id();

                // Relazione con clients.id
                $table->foreignId('client_id')
                    ->constrained('clients')
                    ->onDelete('cascade');

                // Marca del veicolo
                $table->string('brand');

                // Modello del veicolo
                $table->string('model');

                // Anno del veicolo
                $table->year('year');

                // Targa
                $table->string('license_plate')->unique();

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
        Schema::dropIfExists('vehicles');
    }
};
