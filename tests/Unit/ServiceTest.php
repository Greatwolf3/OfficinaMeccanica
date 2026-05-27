<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Models\Service;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_service_can_be_created(): void
    {
        $client = Client::create([
            'name' => 'Mario Rossi',
            'phone' => '3331234567',
            'email' => 'mario@test.it',
            'address' => 'Via Roma 10, Bologna',
        ]);

        $vehicle = Vehicle::create([
            'client_id' => $client->id,
            'brand' => 'Fiat',
            'model' => 'Punto',
            'year' => '2018',
            'license_plate' => 'AB123CD',
        ]);

        $service = Service::create([
            'vehicle_id' => $vehicle->id,
            'description' => 'Cambio olio',
            'cost' => 120.50,
            'date' => '2025-01-10',
        ]);

        $this->assertDatabaseHas('services', [
            'description' => 'Cambio olio',
            'cost' => 120.50,
        ]);
    }

    public function test_service_belongs_to_vehicle(): void
    {
        $client = Client::create([
            'name' => 'Mario Rossi',
            'phone' => '3331234567',
            'email' => 'mario@test.it',
            'address' => 'Via Roma 10, Bologna',
        ]);

        $vehicle = Vehicle::create([
            'client_id' => $client->id,
            'brand' => 'Fiat',
            'model' => 'Punto',
            'year' => '2018',
            'license_plate' => 'AB123CD',
        ]);

        $service = Service::create([
            'vehicle_id' => $vehicle->id,
            'description' => 'Cambio olio',
            'cost' => 120.50,
            'date' => '2025-01-10',
        ]);

        $this->assertEquals($vehicle->id, $service->vehicle->id);
        $this->assertEquals('Fiat', $service->vehicle->brand);
    }
}
