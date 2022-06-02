@extends('templates.corpo')
@section('title', 'Álbuns Form')
@section('album-form')

@include('templates.header')

@include('templates.menu')

@if (session('success'))
                 <input type="text" id="sucesso" hidden value="{{ session('success') }}">
@endif

<section id="container" class="">

      @include('templates.header')

      @include('templates.menu')

      <section id="main-content">


          <section class="wrapper">
                 <div class="row">
                      <section class="card" style="width: 100%;">
                          <header class="card-header">
                              Álbum
                          </header>
                          <div class="card-body">
                              <div class=" form">
                              @if(isset($album))
                              <form action="{{url('album/update/'.$album->id)}}" method="POST" enctype="multipart/form-data">
                              @else
                              <form action="{{route('cadastro.add')}}" method="POST" id="formCadastro" enctype="multipart/form-data">
                              @endif

                                      @csrf

                                      <div class="container-grupo" style="display: flex; width: 100%; justify-content:center; flex-wrap:wrap;">
                                            <div class="form-group">
                                                <label for="cname" class="control-label col-lg-2" style="display: flex; max-width: 321px !important;">Nome do Álbum</label>
                                                <div class="labelx col-lg-10">
                                                    @if(isset($album))
                                                    <input style="width: 396px;" class=" form-control" id="nome" name="nome" minlength="2" value="{{$album->nome_album}}" type="text"/>
                                                    @else
                                                    <input style="width: 396px;"  class=" form-control" id="nome" name="nome" value="{{old('nome')}}" minlength="2" type="text"/>
                                                    @endif
                                                    @if ($errors->any())
                                                        <p style="margin-top: 0 !important; margin-bottom: 0 !important; color: red">{{ $errors->first('nome') }}</p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="class" style="display: flex; width: 371px;">
                                                     <label for="ccomment" class="control-label col-lg-6 d-flex">Nome da faixa
                                                    </label>
                                                    <label for="ccomment" class="control-label col-lg-6 d-flex">Duração
                                                    </label>
                                                    @if(isset($album))
                                                        <div class="control-label d-flex mb-2" style="width: 50px;">
                                                            <div class="btn-success" style="padding: 0px 8px 0px 8px; cursor:pointer;" onclick="informacoesGerais()">+</div>
                                                        </div>
                                                    @endif
                                                </div>


                                                    <div class="labelx col-sm">
                                                        @if (isset($album))
                                                        <div class="info d-flex ">


                                                            <div id="informacoesGerais">
                                                                <div class="info-input">
                                                                    @foreach ($faixa as $fd)
                                                                    <div class="flex-info d-flex">


                                                                        <input type="text" style="width: 174px;" class="form-control" id="informacoesgerais" value="{{ $fd->nome_faixa }}" name="faixa[]" id="" disabled>
                                                                        <input type="text" style="width: 174px;" class="form-control" id="informacoesgerais" value="{{ $fd->duracao_faixa }}" name="duracao[]" id="" disabled>
                                                                        <div class="botao m-2">
                                                                            <div class="btn-danger" style="padding: 3px 10px 3px 10px; cursor:pointer;" onclick="deleteInformacoes(<?= $fd->id ?>)">
                                                                                -</div>
                                                                        </div>

                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>


                                                        </div>
                                                        @else
                                                        <div class="infor-gerais d-flex">
                                                            <input type="text" style="width: 174px;" class="form-control" id="informacoesgerais"  name="faixa[]">
                                                            <input type="text" style="width: 174px;" class="form-control" id="tel"  name="duracao[]">
                                                            <div class="botao m-2">
                                                                <div class="btn-success" style="padding: 3px 8px 3px 8px; cursor:pointer;" onclick="informacoesGerais()">+</div>
                                                            </div>
                                                        </div>
                                                        <div id="informacoesGerais"></div>
                                                        @endif
                                                    </div>
                                                    @if ($errors->any())
                                                    <div class="class" style="display: flex; width: 409px;">

                                                            <p class="control-label col-lg-6 " style="margin-top: 0 !important; margin-bottom: 0 !important; color: red">{{ $errors->first('faixa') }}</p>
                                                            <p class="control-label col-lg-6 " style="margin-top: 0 !important; margin-bottom: 0 !important; color: red">{{ $errors->first('duracao') }}</p>

                                                    </div>
                                                    @endif
                                            </div>
                                      </div>



                                      <input hidden type="submit" value="" id="enviar">
                                  </form>
                                  <div class="form-group">

                                          <div class="mr-3" style="display: flex;justify-content: end;">
                                            <button class="btn btn-default m-2" type="button"><a href="{{route('album')}}">Cancelar</a></button>
                                              <button class="btn btn-primary mt-2 mb-2 ml-2" onclick="salvar()" >Salvar</button>

                                          </div>
                                    </div>

                              </div>
                          </div>
                      </section>
                  </div>





              <!-- page end-->
          </section>
      </section>


  <style>

   .hover-imagem{
       overflow: scroll;
   }
    .sombra{
        position: absolute;
        z-index: 99;
        width: 200px;
        height: 100px;
        margin: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #00000099;
    }
   .sombra:hover{
        background-color: #000000c9;
        cursor: pointer;
   }

   .labelx label{
       color: red;
       font-size: 12px;
   }

  </style>


<script>

           function salvar(){

                swal.fire({
                        title: 'Deseja realmente fazer essa operação?',
                        showCancelButton: true,
                        confirmButtonText: 'Sim',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.value) {

                            document.getElementById('enviar').click()

                        }
                    })
            }
</script>

<script>
            function okDelete(id, img) {
                console.log(img)
                console.log(id)
                swal.fire({
                    title: 'Deseja realmente excluir essa imagem?',
                    text: 'Você não poderá reverter isso!',
                    imageUrl: window.location.origin + '/img/events/'+img,
                    imageHeight: 100,
                    showCancelButton: true,
                    confirmButtonText: 'Sim, exclua-o!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        removeRegister(id);
                    }
                })
            }
        </script>

        <script>
            function removeRegister(id) {

                axios.get(window.location.origin + '/cms/produtos/imagem/delete/'+id)
                .then(function (response) {

                    swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Excluído!',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    setInterval(displayHello, 2000);

                    function displayHello(){
                        return document.location.reload(true);
                    }


                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });



            }
        </script>


      <script>
        var loadFile = function(event) {
        var recebe = document.getElementById('recebeimg');

        console.log(event)

        for(var i= 0; i < event.target.files.length; i++){
              var imagem = document.createElement('img')
              imagem.src = URL.createObjectURL(event.target.files[i])
              imagem.height = '70'
              imagem.style.margin = '10px'
              console.log(imagem.src);
              recebe.appendChild(imagem)

            };

        }

        </script>

@endsection
