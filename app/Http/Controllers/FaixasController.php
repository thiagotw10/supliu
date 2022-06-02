<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Faixas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaixasController extends Controller
{
    public function album(Request $request){

        $album = Album::all();
        $faixa = Faixas::all();

        if($request->query('album')){

           $filter = $request->query('album');
           $album = DB::table('albums')->where('nome_album', 'LIKE', $request->query('album').'%')->get();


           if(isset($album[0]) == ''){
               $mensage = 'Não tem álbum com esse nome.';
                return view('album-front.album', compact('album', 'faixa', 'mensage', 'filter'));
           }else{
                 return view('album-front.album', compact('album', 'faixa', 'filter'));
           }
        }


        return view('album-front.album', compact('album', 'faixa'));
    }
}
