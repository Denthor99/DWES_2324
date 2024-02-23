<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articulos = [
        
            [
                'id' => 1,
                'descripcion'=>'Portátil HP MD12345',
                'modelo'=>'HP 15-1234-20',
                'categoria'=> 0,
                'unidades'=> 12,
                'precio_coste'=> 550.50,
                'precio_venta'=> 580.00
            ],
            [
                'id' => 2,
                'descripcion'=>'Tablet - Samsung Galaxy Tab A (2019)',
                'modelo'=>'Exynos',
                'categoria'=> 5,
                'unidades'=> 200,
                'precio_coste'=> 300.00,
                'precio_venta'=> 329.99
            ],
            [
                'id' => 3,
                'descripcion'=>'Impresora multifunción - HP',
                'modelo'=>'DeskJet 3762',
                'categoria'=> 4,
                'unidades'=> 2000,
                'precio_coste'=> 69.00,
                'precio_venta'=> 89.00
            ],
            [
                'id' => 4,
                'descripcion'=>'TV LED 40" - Thomson 40FE5606 - Full HD',
                'modelo'=>'Thomson 40FE5606',
                'categoria'=> 3,
                'unidades'=> 300,
                'precio_coste'=> 259.99,
                'precio_venta'=> 300.00
            ],
            [
                'id' => 5,
                'descripcion'=>'PC Sobremesa - Acer Aspire XC-830',
                'modelo'=>'Acer Aspire XC-830',
                'categoria'=> 1,
                'unidades'=> 20,
                'precio_coste'=> 329.99,
                'precio_venta'=> 349.99
            ],
            [
                'id' => 6,
                'descripcion'=>'Portatil - Lenovo IdeaPad Slim 3 15IAH8 15.6" FHD',
                'modelo'=>'Lenovo IdeaPad Slim 3',
                'categoria'=> 0,
                'unidades'=> 10,
                'precio_coste'=> 469.00,
                'precio_venta'=> 489.00

            ],
            [
                'id' => 7,
                'descripcion'=>'Monitor - Philips B-Line 278B1 27" LED IPS UltraHD 4K',
                'modelo'=>'Philips B-Line 278B1',
                'categoria'=> 3,
                'unidades'=> 28,
                'precio_coste'=> 199.99,
                'precio_venta'=> 225.00

            ],
            [
                'id' => 8,
                'descripcion'=>'Monitor - Samsung Essential LS27C310EAUXEN 27" LED IPS FullHD',
                'modelo'=>'Samsung Essential LS27C310EAUXEN',
                'categoria'=> 3,
                'unidades'=> 180,
                'precio_coste'=> 125.00,
                'precio_venta'=> 150.00

            ],
            [
                'id' => 9,
                'descripcion'=>'Portatil - Alurin Go Start Intel Celeron N4020/8GB/256GB SSD/14"',
                'modelo'=>'Alurin Go Start',
                'categoria'=> 0,
                'unidades'=> 3,
                'precio_coste'=> 239.99,
                'precio_venta'=> 259.99

            ],
            [
                'id' => 10,
                'descripcion'=>'PC Sobremesa - Medion Erazer Recon P25 MD35174 AMD Ryzen 7 Pro 4750G/16GB/512GB SSD/RTX 3060',
                'modelo'=>'Medion Erazer Recon P25 MD35174',
                'categoria'=> 1,
                'unidades'=> 19,
                'precio_coste'=> 659.00,
                'precio_venta'=> 689.99

            ]
        ];

        return view('articulos', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
