<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ejemploNoOKTest extends TestCase
{
    /**
     * Povocamos un error
     */
    public function test_example(): void
    {
        $response = $this->get('/perico');

        $response->assertStatus(200);
    }
}
