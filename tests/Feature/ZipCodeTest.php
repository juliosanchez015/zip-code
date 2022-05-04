<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ZipCodeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testError()
    {
        $response = $this->get('/api/zip-codes/99999');

        $response->assertStatus(400)->assertExactJson([
            "message" => "zip code does not exist"
        ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGet()
    {
        $response = $this->get('/api/zip-codes/20010');
        $response->assertStatus(200)->assertExactJson( [
            "zip_code" => "20010",
            "locality" => "Aguascalientes",
            "federal_entity" => [
                "key" => "1",
                "name" => "Aguascalientes",
                "code" => null
            ],
            "municipality" => [
                "key" => "1",
                "name" => "Aguascalientes"
            ],
            "settlements" => [
                [
                    "key" => 2,
                    "name" => "Colinas del Rio",
                    "zone_type" => "Urbano",
                    "settlement_type" => [
                        "name" => "Fraccionamiento"
                    ]
                ],
                [
                    "key" => 3,
                    "name" => "Las Brisas",
                    "zone_type" => "Urbano",
                    "settlement_type" => [
                        "name" => "Fraccionamiento"
                    ]
                ],
                [
                    "key" => 4,
                    "name" => "Olivares Santana",
                    "zone_type" => "Urbano",
                    "settlement_type" => [
                        "name" => "Colonia"
                    ]
                ],
                [
                    "key" => 5,
                    "name" => "Ramon Romo Franco",
                    "zone_type" => "Urbano",
                    "settlement_type" => [
                        "name" => "Fraccionamiento"
                    ]
                ],
                [
                    "key" => 6,
                    "name" => "San Cayetano",
                    "zone_type" => "Urbano",
                    "settlement_type" => [
                        "name" => "Fraccionamiento"
                    ]
                ]
            ]
        ]);
    }
}
