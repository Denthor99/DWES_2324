<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class rutaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Ruta /test
     */
    public function testTest(): void
    {
        $response = $this->get('/test');

        $response->assertStatus(200);

        $response->assertSee("Daniel Alfonso Rodríguez Santos");
    }

    /**
     * Ruta /api/user
     */
    public function testUserApi(): void
    {
        $response = $this->get('api/user');

        $response->assertSee('La Ley de Moore');
    }

    /**
     * Ruta /user/view/id
     */
    public function testView(): void
    {
        $response = $this->get('user/view');

        $response->assertSee('Vista vacía');
    }

    /**
     * Ruta /user/nombre/apellidos
     */
    public function testUserNombre(): void
    {
        $response = $this->get('user/Daniel/Pérez%20Vázquez');

        $response->assertSee('Buenos días Daniel Pérez Vázquez');
    }

    /**
     * Ruta parametro opcional
     */
    public function testBank(): void
    {
        $response = $this->get('bank/1234123453/908');

        $response->assertSee('cvc de la tarjeta: 908');
    }
}
