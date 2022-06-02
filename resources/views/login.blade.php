<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Login Tião</title>
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <style>
                html,
          body {
            height: 100%;
          }

          body {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
          }

          .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
          }
          .form-signin .checkbox {
            font-weight: 400;
          }
          .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
          }
          .form-signin .form-control:focus {
            z-index: 2;
          }
          .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
          }
          .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
          }
    </style>

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
            @if (session('success'))
                <input type="text" id="sucesso" hidden value="{{ session('success') }}">
            @endif
    <form class="form-signin" action="{{route('login')}}" >
      <img class="mb-4" src="{{asset('img/logo.png')}}" alt="" width="200" height="72">
      <h1 class="h3 mb-3 font-weight-normal"></h1>
      <label for="inputEmail" class="sr-only" style="width: 100%; justify-content:end; margin-bottom: 3px;"><div style="width: 50px;">Email</div></label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only"  style="width: 100%; justify-content:end; margin-bottom: 3px;"><div style="width: 50px;">Password</div></label>
      <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>

            @if ($errors->any())
                <div class="alert alert-danger text-center">

                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach

                </div>
            @endif
            @if(session('danger'))
            <div class="alert alert-danger">
                {{session('danger')}}
            </div>
          @endif
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022 todos os direitos reservados Tião Carreiro.</p>
    </form>

   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="{{asset('js/cms/alerta-de-salvamento.js')}}"></script>
  </body>
</html>
