<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecretariaController extends Controller
{
    public function index()
    {
        return view('secretaria.dashboard');
    }
}
