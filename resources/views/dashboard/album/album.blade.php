@extends('templates.corpo')
@section('title', 'Albuns')
@section('album')
@include('templates.header')

@include('templates.menu')

<section id="container" class="">


      <section id="main-content">


          <section class="wrapper" style="height: 100vh;">


            {!! $html !!}

            <div class="panel-body pull-right" style="height: 100px; width: 100%; display:flex; justify-content:space-between; align-items:center;">
                <h5>Registros</h5>
                <a href="{{route('cadastro.add')}}" class="btn btn-orange" style="background-color: #1F3F7C; color: white"> <i class="fa fa-plus"></i>Adicionar album</a>
            </div>

            @if (session('success'))
                 <input type="text" id="sucesso" hidden value="{{ session('success') }}">
            @endif

            <table class="table table-striped table-bordered">
                <thead  style="background-color: #1F3F7C; color: white;">
                    <tr>
                    <th scope="col">Album</th>
                    <th class="text-center" scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dados as $album)
                        <tr>
                        <td><p style="margin-top: 5px; font-weight: bold;">{{$album->nome_album}}</p></td>
                        <td id="detalhes" style="display: flex; justify-content:center; align-items:center; border:none; padding: 16px 0; ">
                            <a onmouseover="descricao(this)" aria-label="Editar" style="position: relative; margin: 0 2px" href="{{url('album/edit/'.$album->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#1F3F7C" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                <line x1="16" y1="5" x2="19" y2="8" />
                                </svg>
                            </a>
                            <div onmouseout="descricao(this)" aria-label="Excluir" style="cursor: pointer; position:relative; margin: 0 2px"  onclick="okDelete(<?= $album->id ?>)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="29" height="29" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <line x1="4" y1="7" x2="20" y2="7" />
                                    <line x1="10" y1="11" x2="10" y2="17" />
                                    <line x1="14" y1="11" x2="14" y2="17" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </div>
                        </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="d-flex" style="flex-direction: row-reverse;">
            {{ $dados->links('vendor.pagination.bootstrap-4') }}
            </div>


          </section>

      </section>

</section>

@endsection
