<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Solo un método
    public function __invoke(){
        $clientes = [
            [
                'id' => 1,
                'nombre' => 'Daniel Alfonso'
            ],
            [
                'id' => 2,
                'nombre' => 'Juan Carlos'
            ],
            [
                'id' => 3,
                'nombre' => 'Ana Ordoñez'
            ]
        ];

        $usuarios = ['Carlos','Josema'];

        $autor = 'Daniel Alfonso Rodríguez Santos';
        $curso = '23/24';
        $modulo= 'DWES';
        $nivel = 2;
        return view('home.index',compact('autor','curso','modulo','nivel','clientes','usuarios'));
    }
}
