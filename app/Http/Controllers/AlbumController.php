<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($_GET['album']))
        {
            $search_text = $request->input('album');
            $albuns = Album::where('nome', 'LIKE', '%' .$search_text.'%')->get();
            return view('album.index', compact('albuns'));
        }else{
            $albuns = Album::all();
            return view('album.index', compact('albuns'));
        }
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
        ];

        $validator = Validator::make($request->all(),[
            'nome' => 'required|max:20',
            'ano' => 'required',
        ], $mensagens);

        if($validator->fails())
        {
            return response()->json([
                'status' =>400,
                'errors' => $validator->getMessageBag(),
            ]);
        }else{
             $album = new Album;
             $album ->nome = $request->input('nome');
             $album ->ano = $request->input('ano');
             $album ->save();
             return response()->json([
                'status' =>200,
                'message' => 'Album Adicionado com Sucesso',
             ]);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);
        if($album)
        {
            return response()->json([
                'status'=>200,
                'album'=> $album,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Nenhum Álbum Encontrado'
            ]);
        }

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mensagens = [
            'required' => ':Attribute é obrigatório!',
        ];
        
        $validator = Validator::make($request->all(), [
            'nome' => 'required|max:191',
            'ano' => 'required|max:191',
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
            $album = Album::find($id);
            if($album)
            {
             $album ->nome = $request->input('nome');
             $album ->ano = $request->input('ano');
             $album->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Álbum Atualizado com Sucesso.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Nenhum Álbum Encontrado'
                ]);
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        if($album)
        {
            $album->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Álbum Deletado com Sucesso.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Nenhum Álbum Encontrado.'
            ]);
        }
    }
}
