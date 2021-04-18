<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiTest extends TestCase
{
    /** @test */
    public function can_test_store_developer()
    {
        $data = [
            "nome" => "JOAO SANTOS",
            "sexo" => "M",
            "idade" => "30",
            "hobby" => "LER LIVROS",
            "datanascimento" => "1980-01-01"
        ];

        $response = $this->post('/api/developers', $data);

        $response->assertStatus(201);
    }

    /** @test */
    public function can_test_get_all_developers()
    {
        $response = $this->get('/api/developers');

        $response->assertStatus(200);
    }

    /** @test */
    public function can_test_get_only_developer()
    {
        $developers = $this->get('/api/developers');

        $response = $this->get('/api/developers/' . $developers[0]['id']);

        $response->assertStatus(200);
    }

    /** @test */
    public function can_test_put_developer()
    {
        $developers = $this->get('/api/developers');

        $response = $this->put('/api/developers/' . $developers[0]['id'], $developers[0]);

        $response->assertStatus(200);
    }

    /** @test */
    public function can_test_delete_developer()
    {
        $developers = $this->get('/api/developers');

        $response = $this->delete('/api/developers/' . $developers[0]['id']);

        $response->assertStatus(204);
    }
}
