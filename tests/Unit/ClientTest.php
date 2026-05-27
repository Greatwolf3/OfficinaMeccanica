<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    public function test_client_can_be_created(): void
    {
        $client = Client::create([
            'name' => 'Mario Rossi',
            'phone' => '3331234567',
            'email' => 'mario@test.it',
            'address' => 'Via Roma 10, Bologna',
        ]);

        $this->assertDatabaseHas('clients', [
            'name' => 'Mario Rossi',
            'email' => 'mario@test.it',
        ]);
    }

    public function test_client_has_many_vehicles(): void
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

        $this->assertCount(1, $client->vehicles);
        $this->assertEquals('Fiat', $client->vehicles->first()->brand);
    }
}
