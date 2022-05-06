<?php

namespace App\Http\Controllers\Indicated;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndicatedController extends Controller
{
    /**
     * Função responsável por carregar a view de indicações
     */
    public function index()
    {
        return view('index');
    }
}
