<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Rule\InvokedAtLeastOnce;

class HomeController extends Controller
{
    public function __invoke(){
        return view('home');
    }
}
