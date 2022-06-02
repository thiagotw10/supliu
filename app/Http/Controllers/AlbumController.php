<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Faixas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\validationRequest;

class AlbumController extends Controller
{
    public function album(Request $request){


        function form_consulta($url, $campos = [], $campo = "", $valor = "", $limite = 10, $titulo = "Álbuns") {

            $html = "<section class=\"panel\">";
            $html .= "<header class=\"panel-heading\">$titulo</header>";
            $html .= "<div class=\"panel-body\">";
            $html .= "<form acceptcharset=\"UTF-8\" method=\"get\" action=\"$url\" theme=\"simple\">";
            $html .= "<div class=\"row\">";
            $html .= "<div class=\"col-lg-3\">";
            $html .= "<div class=\"form-group\">";
            $html .= "<label>Pesquisar por</label>";
            $html .= "<div>";
            $html .= "<select name=\"c_campo\" class=\"form-control m-bot15\">";
            foreach ($campos as $key => $value) {
                $html .= "<option value=\"$key\" " . ($key == $campo ? "selected=\"true\"" : "") . ">$value</option>";
            }
            $html .= "</select>";
            $html .= "</div>";
            $html .= "</div>";
            $html .= "</div>";
            $html .= "<div class=\"col-lg-3\">";
            $html .= "<div class=\"form-group\">";
            $html .= "<label>Exibir</label>";
            $html .= "<div>";
            $html .= "<select name=\"c_limite\" class=\"form-control m-bot15\">";
            for ($i = 1; $i <= 5; $i++) {
                $html .= "<option value=\"" . ($i * 10) . "\" " . ($i * 10 == $limite ? "selected=\"true\"" : "") . ">" . ($i * 10) . " registros</option>";
            }
            $html .= "</select>";
            $html .= "</div>";
            $html .= "</div>";
            $html .= "</div>";
            $html .= "<div class=\"col-lg-6\">";
            $html .= "<div class=\"form-group\">";
            $html .= "<label>&nbsp;</label>";
            $html .= "<div class=\"input-group m-bot15 right\">";
            $html .= "<input type=\"text\" name=\"c_valor\" placeholder=\"Digite o que você quer encontrar\" class=\"form-control\" value=\"$valor\" />";
            $html .= "<span class=\"input-group-btn d-flex\">";
            $html .= "<button type=\"submit\" onmouseover=\"descricao(this)\" aria-label=\"Pesquisar\" class=\"pesquisar\"><i class=\"fa fa-search\"></i></button>";
            $html .= "<a href=\"album\" style=\"padding: 5px 10px 5px 10px; background-color:#1F3F7C; border-radius: 5px; color: white; display: flex; justify-content: center; align-items: center; \"> Limpar </a>";
            $html .= "</span>";
            $html .= "</div>";
            $html .= "</div>";
            $html .= "</div>";
            $html .= "</div>";
            $html .= "</form>";

            $html .= "</div>";
            $html .= "</section>";

            return $html;

        }

        $camposBusca = 'nome_album';

        if($request->query('c_valor') != null){
            $term = $request->query('c_valor');
            $campo = $request->query('c_campo');
            $linha = $request->query('c_limite');


            $dados =  DB::table('albums')->where($campo, 'LIKE', $term.'%')->paginate($linha);

            $camposBusca = $request->query('c_campo');

        }else{
            $dados = Album::paginate(3);
        }

        $html = form_consulta(route('album'), [$camposBusca =>($request->query('c_campo'))? $request->query('c_campo'): 'nome', 'nome_album' => 'nome'], '', $request->query('c_valor'), ($request->query('c_limite')? $request->query('c_limite'): '10'));



        return view('dashboard.album.album', compact('html', 'dados'));
    }

    public function albumForm(){
        return view('dashboard.album.album-form');
    }

    public function albumDados(validationRequest $request){

       $faixavar = [];
       $duracaovar = [];

       if($request->faixa[0] == null || $request->duracao[0] == null){
           return redirect('album-form');
       }

       $album = Album::create([
            'nome_album' => $request->nome
        ]);

        foreach($request->faixa as $chave => $faixa){
            $faixavar[$chave] = $faixa;
        }

        foreach($request->duracao as $chave => $duracao){
            $duracaovar[$chave] = $duracao;
        }


        $combine = array_combine($faixavar, $duracaovar);

        foreach($combine as $chave => $duracao){
            Faixas::create([
                'album_id' => $album->id,
                'nome_faixa' => $chave,
                'duracao_faixa' => $duracao
            ]);
        }

        $request->session()->flash('success', 'album');
        return redirect('album');
    }


    public function albumEdit($id){
        $album = Album::find($id);
        $faixa = DB::table('faixas')->where('album_id', $album->id)->get();
        return view('dashboard.album.album-form', compact('album', 'faixa'));
    }

    public function albumUpdate(Request $request, $id){
        $album = Album::find($id);
        $faixavar = [];
        $duracaovar = [];

        if($request->faixa != null){


        foreach($request->faixa as $chave => $faixa){
            $faixavar[$chave] = $faixa;
        }

        foreach($request->duracao as $chave => $duracao){
            $duracaovar[$chave] = $duracao;
        }

        $combine = array_combine($faixavar, $duracaovar);

        foreach($combine as $chave => $duracao){
            Faixas::create([
                'album_id' => $id,
                'nome_faixa' => $chave,
                'duracao_faixa' => $duracao
            ]);
        }

        }

        if($request->nome != ''){
            $album->update([
                'nome_album' => $request->nome
            ]);
        }

        $request->session()->flash('success', 'albumUpdate');
        return redirect('album/edit/'.$id);

    }


    public function albumDelete($id){
        $album = Album::find($id);

        $album->delete();

        return redirect('album');
    }


    public function faixaDelete($id){
        $faixa = Faixas::find($id);

        $faixa->delete();
    }

}
