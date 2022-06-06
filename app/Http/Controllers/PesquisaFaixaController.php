<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Faixa;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PesquisaFaixaController extends Controller
{
    public function index(Request $request)
    {
        if(isset($_GET['faixa']))
        {
            $albuns = Album::all();
            if($albuns->isEmpty()){
                $faixas = Faixa::paginate(1);
            }else {
            $search_text = $request->input('faixa');
            foreach($albuns as $album)
            {
                $faixas[] = Faixa::with('album')->where('albuns_id', $album->id)->where('nome_faixa', 'LIKE', '%' .$search_text.'%')->get();
            }
        }
        return view('pesquisa-faixa.index', compact('albuns','faixas'));
            
        }else{
            $albuns = Album::all();
            if($albuns->isEmpty()){
                $faixas = Faixa::paginate(1);
            }else {
            foreach($albuns as $album)
            {
                $faixas[] = Faixa::with('album')->where('albuns_id', $album->id)->get();
            }
        }
        return view('pesquisa-faixa.index', compact('albuns','faixas'));
    }
}
    
}