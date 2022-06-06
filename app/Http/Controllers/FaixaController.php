<?php

namespace App\Http\Controllers;

use App\Models\Faixa;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;


class FaixaController extends Controller
{
    
    public function __construct(Faixa $faixas)
    {
        $this->faixas = $faixas;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if(isset($_GET['faixa']) && strlen($_GET['faixa'])>1)
        {
            $search_text = $request->input('faixa');
            $albuns = Album::all();
            foreach($albuns as $album)
            {
                $faixas[] = Faixa::with('album')->where('albuns_id', $album->id)->where('nome_faixa', 'LIKE', '%' .$search_text.'%')->get()->toArray();
            }
            $faixas = $this->paginate($faixas);
            $faixas->withPath('');
            
            return view('faixa.index', compact('albuns','faixas'));
        }else{
            $albuns = Album::all();
            if($albuns->isEmpty()){
                $faixas = Faixa::paginate(1);
            }else {
                foreach($albuns as $album)
                {
                    $faixas[] = Faixa::with('album')->where('albuns_id', $album->id)->get()->toArray();
                }  
                $faixas = $this->paginate($faixas, 1);
                $faixas->withPath('');
            }
        return view('faixa.index', compact('albuns','faixas'));
        }
    }

    public function paginate($items, $perPage = 5, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 5);
        $total = count($items);
        $currentpage = $page;
        $offset = ($currentpage * $perPage) - $perPage ;
        $itemstoshow = array_slice($items , $offset , $perPage);
        return new LengthAwarePaginator($itemstoshow ,$total   ,$perPage);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensagens = [
            'required' => ':Attribute é obrigatório!',
            'albuns_id.required' => 'Nome do Álbum é obrigatório',
        ];

        $validator = Validator::make($request->all(),[
            'nome_faixa' => 'required|max:20',
            'numero_faixa' => 'required',
            'albuns_id'=>'required',
            'duracao_faixa'=>'required',
        ], $mensagens);
        
        if($validator->fails())
        {
            return response()->json([
                'status' =>400,
                'errors' => $validator->getMessageBag(),
            ]);
        }else{
            $faixa = new Faixa;
            $faixa ->nome_faixa = $request->input('nome_faixa');
            $faixa ->numero_faixa = $request->input('numero_faixa');
            $faixa ->albuns_id = $request->input('albuns_id');
            $faixa ->duracao_faixa = $request->input('duracao_faixa');
            $faixa ->save();
            return response()->json([
                'status' =>200,
                'message' => 'Faixa Adicionada com Sucesso',
            ]);
            
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faixa  $faixa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faixa = Faixa::find($id);
        if($faixa)
        {
            return response()->json([
                'status'=>200,
                'faixa'=> $faixa,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Nenhuma Faixa Encontrada'
            ]);
        }

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faixa  $faixa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mensagens = [
            'required' => ':Attribute é obrigatório!',
            'albuns_id.required' => 'Nome do Álbum é obrigatório',
        ];
        
        $validator = Validator::make($request->all(), [
            'nome_faixa' => 'required|max:191',
            'numero_faixa' => 'required|max:191',
            'albuns_id'=>'required|max:191',
            'duracao_faixa'=>'required',


        ], $mensagens);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors' => $validator->getMessageBag(),
            ]);
        }
        else
        {
            $faixa = Faixa::find($id);
            if($faixa)
            {
             $faixa ->nome_faixa = $request->input('nome_faixa');
             $faixa ->numero_faixa = $request->input('numero_faixa');
             $faixa ->albuns_id = $request->input('albuns_id');
             $faixa ->duracao_faixa = $request->input('duracao_faixa');
             $faixa->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Faixa Atualizada com Sucesso.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Nenhuma Faixa Encontrada'
                ]);
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faixa  $faixa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faixa = Faixa::find($id);
        if($faixa)
        {
            $faixa->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Faixa Deletada com Sucesso.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Nenhuma Faixa Encontrada.'
            ]);
        }
    }
}