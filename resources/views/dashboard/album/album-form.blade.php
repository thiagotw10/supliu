@extends('templates.corpo')
@section('title', 'Albuns Form')
@section('album-form')

@include('templates.header')

@include('templates.menu')



<section id="container" class="">
      <!--header start-->
      @include('templates.header')
      <!--header end-->
      <!--sidebar start-->
      @include('templates.menu')
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">


          <section class="wrapper">
                 <div class="row">
                      <section class="card" style="width: 100%;">
                                      @if ($errors->any())
                                      <div class="container-modal-alerta" style="display: flex; justify-content:center; align-items:center; width: 100%; height: 100vh; position:fixed; left:0; top: 0; z-index: 9999999; background-color:#2a3542d5;" id="modalErro">
                                            <div onclick="modalErro()" style="position: absolute; right: 10px; top: 10px; cursor:pointer;">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-down-left-circle" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <circle cx="12" cy="12" r="9" />
                                                <line x1="15" y1="9" x2="9" y2="15" />
                                                <polyline points="15 15 9 15 9 9" />
                                                </svg>
                                            </div>
                                            <div class="alert alert-danger text-center" style="display: flex; justify-content:center; align-items:center; flex-direction:column;">

                                                    @foreach ($errors->all() as $error)
                                                        <p style="margin-top: 0 !important; margin-bottom: 0 !important">{{ $error }}</p>
                                                    @endforeach

                                            </div>
                                     </div>
                                       @endif
                          <header class="card-header">
                              Album
                          </header>
                          <div class="card-body">
                              <div class=" form">
                              @if(isset($dados))
                              <form action="{{url('cms/cadastro/update/'.$dados->id)}}" method="POST" enctype="multipart/form-data">
                              @else
                              <form action="{{route('cadastro.add')}}" method="POST" id="formCadastro" enctype="multipart/form-data">
                              @endif

                                      @csrf

                                      <div class="container-grupo" style="display: flex; width: 100%; justify-content:center; flex-wrap:wrap;">
                                            <div class="form-group">
                                                <label for="cname" class="control-label col-lg-2" style="display: flex; max-width: 321px !important;">Nome do Album</label>
                                                <div class="labelx col-lg-10">
                                                    @if(isset($album))
                                                    <input style="width: 396px;" class=" form-control" id="nome" name="nome" minlength="2" value="{{$album->nome_album}}" type="text" required />
                                                    @else
                                                    <input style="width: 396px;"  class=" form-control" id="nome" name="nome" minlength="2" type="text" required />
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="class" style="display: flex; width: 372px;">
                                                     <label for="ccomment" class="control-label col-lg-6 d-flex">Nome da faixa
                                                    </label>
                                                    <label for="ccomment" class="control-label col-lg-6 d-flex">Duração
                                                    </label>
                                                    @if(isset($album))
                                                        <div class="control-label d-flex mb-2" style="width: 50px;">
                                                            <div class="btn-success" style="padding: 3px 8px 3px 8px; cursor:pointer;" onclick="informacoesGerais()">+</div>
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


                                                                        <input type="text" class="form-control" id="informacoesgerais" value="{{ $fd->nome_faixa }}" name="faixa[]" id="" disabled required>
                                                                        <input type="text" class="form-control" id="informacoesgerais" value="{{ $fd->duracao_faixa }}" name="duracao[]" id="" disabled required>
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
                                                            <input type="text" class="form-control" id="informacoesgerais" name="faixa[]" required>
                                                            <input type="text" class="form-control" id="informacoesgerais" name="duracao[]" required>
                                                            <div class="botao m-2">
                                                                <div class="btn-success" style="padding: 3px 8px 3px 8px; cursor:pointer;" onclick="informacoesGerais()">+</div>
                                                            </div>
                                                        </div>
                                                        <div id="informacoesGerais"></div>
                                                        @endif
                                                    </div>
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




<script src="{{asset('js/cms/js-validation.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
