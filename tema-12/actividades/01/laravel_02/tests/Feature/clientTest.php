<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class clientTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_edit(): void
    {
        $response = $this->get('/clients/edit/5');

        $response->assertStatus(200);
        $response->assertSee('Editar detalles del cliente 5');
    }

    public function test_delete(): void
    {
        $response = $this->get('/clients/delete/5');

        $response->assertStatus(200);
        $response->assertSee('Eliminar cliente 5');
    }

    public function test_deleteMult(): void
    {
        $response = $this->get('/clients/delete/5/8');

        $response->assertStatus(200);
        $response->assertSee('Eliminar clientes desde el 5 hasta el  8');
    }

    public function test_show(): void
    {
        $response = $this->get('/clients/show/8');

        $response->assertStatus(200);
        $response->assertSee('Detalles del cliente 8');
    }

    public function test_new(): void
    {
        $response = $this->get('/clients/new');

        $response->assertStatus(200);
        $response->assertSee('Nuevo cliente');
    }

    
}
