<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Faixa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albuns = Album::all();
        $faixas = Faixa::all();
        return view('inicio', ['albuns' => $albuns, 'faixas' => $faixas]);
    }
}
