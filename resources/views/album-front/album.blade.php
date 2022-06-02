@extends('templates.corpo')
@section('title', 'Albuns Form')
@section('album-form')
<div class="container-mae-front" style="display: flex; justify-content: center; align-items:center; width: 100%; height: 100vh; background-image:url({{asset('img/tiao.png')}}); background-position: center; background-repeat: no-repeat; background-size: cover;">
    <div class="container-modal-principal" style="width: 90%; min-height: 80vh; background-color: #ffffff96;">
        <div class="modal-logo" style="display:flex; justify-content:space-between; align-items:center; width: 100%; height: 120px; background-color: white; flex-wrap: wrap;">
            <div class="img" style="padding: 0 20px;">
                <img src="{{asset('img/logo.png')}}" alt="">
            </div>

            <div class="titulo" style="padding: 0 20px;">
                <h1 style="font-size: 2rem;">Discografia</h1>
            </div>
        </div>

        <form action="{{url('/')}}" class="container-buscar" style="display:flex; align-items:center; justify-content: space-around; width: 100%; height: 120px;">
            <div class="input" style="width: 70%; display:flex; justify-content:center; align-items:center; position:relative;">
                <div class="label" style="position: absolute; left:40px; top: -25px">
                    <span style="color: #939393;">Digite uma palavra chave</span>
                </div>

                <input  @if(isset($filter)) value="{{$filter}}" @endif name="album" style="width: 90%; height: 40px; background-color: white; border-radius: 20px; outline:none; border:none; padding: 0 20px;" type="text" id="">
            </div>

            <div class="botao-buscar" style="width: 30%;display:flex; justify-content:center; align-items:center;">
                    <button style="width: 90%; height: 40px; border-radius: 20px; border:none; background-color: #4a90e2; color: white;">Procurar</button>
            </div>
        </form>

        <div class="lista-modal" style="display:flex; flex-direction:column; justify-content:flex-start; align-items:center; width: 100%; height: 274px; overflow-y: scroll">
            @if(isset($mensage))
                <p>{{$mensage}}</p>
            @endif
            @foreach($album as $af)
            <div class="conteudo-album" style="width: 93%;">
                <div class="titulo-lista">
                    <span style="color: black;"><b>{{$af->nome_album}}</b></span>
                </div>
                <div class="cabecalho-faixa" style="display: flex; justify-content:space-between; align-items:center; height: 40px;">
                    <div class="lado-esquerdo" style="width: 200px;">
                        <span style="padding: 10px 10px;">Nº</span>
                        <span style="padding: 10px 10px;">Faixa</span>
                    </div>
                    <div class="lado-direito" style="width: 100px; display:flex; justify-content:flex-start">
                        <span>Duração</span>
                    </div>
                </div>

                <!-- aqui fica as faixas -->
                @foreach($faixa as $fx)
                @if($fx->album_id == $af->id)
                <div class="cabecalho-faixa" style="display: flex; justify-content:space-between; align-items:center; height: 40px;">
                    <div class="lado-esquerdo" style="width: 200px">
                        <span style="padding: 0 10px;">{{$fx->id}}</span>
                        <span style="padding: 0 10px;">{{$fx->nome_faixa}}</span>
                    </div>
                    <div class="lado-direito" style="width: 100px; display:flex; justify-content:flex-start">
                        <span>{{$fx->duracao_faixa}}</span>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            @endforeach

        </div>
    </div>

</div>
@endsection
