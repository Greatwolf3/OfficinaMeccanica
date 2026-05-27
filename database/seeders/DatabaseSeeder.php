<?php

use App\Models\Client;
use App\Models\Service;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // UTENTE ADMIN
        User::create([
            'name' => 'Admin',
            'email' => 'admin@officina.test',
            'password' => bcrypt('password'),
        ]);

        // CLIENTI
        $client1 = Client::create([
            'name' => 'Mario Rossi',
            'phone' => '3331234567',
            'email' => 'mario@demo.it',
            'address' => 'Via Roma 10, Bologna',
        ]);

        $client2 = Client::create([
            'name' => 'Luigi Bianchi',
            'phone' => '3339876543',
            'email' => 'luigi@demo.it',
            'address' => 'Via Milano 20, Bologna',
        ]);

        // VEICOLI
        $vehicle1 = Vehicle::create([
            'client_id' => $client1->id,
            'brand' => 'Fiat',
            'model' => 'Punto',
            'year' => '2018',
            'license_plate' => 'AB123CD',
        ]);

        $vehicle2 = Vehicle::create([
            'client_id' => $client2->id,
            'brand' => 'BMW',
            'model' => 'Serie 3',
            'year' => '2020',
            'license_plate' => 'EF456GH',
        ]);

        // SERVICES
        Service::create([
            'vehicle_id' => $vehicle1->id,
            'description' => 'Cambio olio e filtro',
            'cost' => 120.50,
            'date' => '2025-01-10',
        ]);

        Service::create([
            'vehicle_id' => $vehicle1->id,
            'description' => 'Sostituzione pastiglie freni anteriori',
            'cost' => 180.00,
            'date' => '2025-03-15',
        ]);

        Service::create([
            'vehicle_id' => $vehicle1->id,
            'description' => 'Controllo climatizzatore e ricarica gas',
            'cost' => 95.00,
            'date' => '2025-04-20',
        ]);

        Service::create([
            'vehicle_id' => $vehicle2->id,
            'description' => 'Revisione completa',
            'cost' => 250.00,
            'date' => '2025-02-15',
        ]);

        Service::create([
            'vehicle_id' => $vehicle2->id,
            'description' => 'Sostituzione batteria',
            'cost' => 150.00,
            'date' => '2025-05-10',
        ]);

        Service::create([
            'vehicle_id' => $vehicle2->id,
            'description' => 'Bilanciatura gomme e allineamento',
            'cost' => 80.00,
            'date' => '2025-06-05',
        ]);
    }
}
