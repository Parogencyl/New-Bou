<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth:client');
    }

    public function index()
    {
        return view('konto.main');
    }
}
