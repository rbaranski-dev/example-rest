<?php

namespace Tests\Feature;

use App\Models\Firma;
use App\Models\Pracownik;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PracownicyTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Test storing an API Pacownik.
     *
     * @return void
     */
    public function testStoreApiPacownik()
    {
        // Generate new data for creating the Pacownik
        $pracownik = [
            'imie' => 'Andrzej',
            'nazwisko' => 'Nowicki',
            'email' => 'user@example.com',
            'firma_id' => Firma::factory()->create()->id,
        ];

        // Send a POST request to store the Pacownik
        $response = $this->post('/api/pracownicy', $pracownik);

        // Assert that the request was successful (status code 201)
        $response->assertStatus(201);

        // Assert that the Pacownik was stored in the database with the provided data
        $this->assertDatabaseHas('pracownicy', $pracownik);
    }

    /**
     * Test updating an API pracownik.
     *
     * @return void
     */
    public function testUpdateApiPacownik()
    {
        // Create a pracownik
        $pracownik = Pracownik::factory()->create();

        // Generate new data for updating the pracownik
        $newData = [
            'imie' => 'Nowe imie',
            'nazwisko' => $pracownik->nazwisko,
            'email' => $pracownik->email,
            'telefon' => $pracownik->telefon, 
            'firma_id' => $pracownik->firma_id,
        ];

        // Send a PUT request to update the pracownik
        $response = $this->put('/api/pracownicy/' . $pracownik->id, $newData);

        // Assert that the request was successful (status code 200)
        $response->assertStatus(200);

        // Assert that the pracownik was updated with the new data
        $this->assertDatabaseHas('pracownicy', $newData);
    }

    public function testIndexApiPacownik()
    {
        // Act
        $response = $this->get('/api/pracownicy');

        // Assert
        $response->assertStatus(200);
    }
}
