<?php

namespace Tests\Feature;

use App\Models\Firma;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FirmyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test storing an API Firma.
     *
     * @return void
     */
    public function testStoreApiFirma()
    {
        // Generate new data for creating the Firma
        $firma = [
            'nazwa' => 'Nazwa Firmy 1',
            'nip' => 'Błotna 12',
            'adres' => 'Błotna 12',
            'miasto' => 'Wojewódzkie',
            'kod_pocztowy' => '80-966',
        ];

        // Send a POST request to store the Firma
        $response = $this->post('/api/firmy', $firma);

        // Assert that the request was successful (status code 201)
        $response->assertStatus(201);

        // Assert that the Firma was stored in the database with the provided data
        $this->assertDatabaseHas('firmy', $firma);
    }

    /**
     * Test updating an API firma.
     *
     * @return void
     */
    public function testUpdateApiFirma()
    {
        // Create a firma
        $firma = Firma::factory()->create();

        // Generate new data for updating the firma
        $newData = [
            'nazwa' => 'Nowa nazwa',
            'nip' => $firma->nip,
            'adres' => 'Nowy adres',
            'miasto' => $firma->miasto,
            'kod_pocztowy' => $firma->kod_pocztowy,
        ];

        // Send a PUT request to update the firma
        $response = $this->put('/api/firmy/' . $firma->id, $newData);

        // Assert that the request was successful (status code 200)
        $response->assertStatus(200);

        // Assert that the firma was updated with the new data
        $this->assertDatabaseHas('firmy', $newData);
    }

    public function testIndexApiFirma()
    {
        // Act
        $response = $this->get('/api/firmy');

        // Assert
        $response->assertStatus(200);
    }
}
