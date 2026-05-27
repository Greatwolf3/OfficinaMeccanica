<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Models\Service;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VehicleTest extends TestCase
{
    use RefreshDatabase;

    public function test_vehicle_can_be_created(): void
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

        $this->assertDatabaseHas('vehicles', [
            'brand' => 'Fiat',
            'license_plate' => 'AB123CD',
        ]);
    }

    public function test_vehicle_belongs_to_client(): void
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

        $this->assertEquals($client->id, $vehicle->client->id);
        $this->assertEquals('Mario Rossi', $vehicle->client->name);
    }

    public function test_vehicle_has_many_services(): void
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

        $this->assertCount(1, $vehicle->services);
        $this->assertEquals('Cambio olio', $vehicle->services->first()->description);
    }
}
