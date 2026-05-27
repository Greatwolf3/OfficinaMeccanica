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
        if (!Schema::hasTable('services')) {

            Schema::create('services', function (Blueprint $table) {

                // ID servizio
                $table->id();

                // Relazione con vehicles.id
                $table->foreignId('vehicle_id')
                    ->constrained('vehicles')
                    ->onDelete('cascade');

                // Descrizione del servizio
                $table->text('description');

                // Costo del servizio
                $table->decimal('cost', 10, 2);

                // Data del servizio
                $table->date('date');

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
        Schema::dropIfExists('services');
    }
};
