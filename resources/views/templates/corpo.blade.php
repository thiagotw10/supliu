<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@300&display=swap" rel="stylesheet">
        <!-- Bootstrap core CSS -->
    <link href="{{asset('dashboard/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('dashboard/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
      <!--right slidebar-->
    <link href="{{asset('dashboard/css/slidebars.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/css/style-responsive.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/global.css')}}">
    <title>@yield('title')</title>
</head>
<body>

    @yield('album')
    @yield('album-form')


    <script src="{{asset('dashboard/js/jquery.js')}}"></script>
    <script src="{{asset('dashboard/js/bootstrap.bundle.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{asset('dashboard/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('dashboard/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('dashboard/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('dashboard/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('dashboard/js/respond.min.js')}}" ></script>

    <!--right slidebar-->
    <script src="{{asset('dashboard/js/slidebars.min.js')}}"></script>

    <!--common script for all pages-->
    <script src="{{asset('dashboard/js/common-scripts.js')}}"></script>

    <!--script for this page-->
    <script src="{{asset('dashboard/js/form-validation-script.js')}}"></script>
    <script src="{{ asset('js/cms/produtos-form.js') }}"></script>

    <script src="https://cdn.rawgit.com/lagden/vanilla-masker/lagden/build/vanilla-masker.min.js"></script>
    <script src="{{asset('js/cms/js-validation.js')}}"></script>
    <script src="{{asset('js/cms/alerta-de-salvamento.js')}}"></script>
    <script src="{{asset('js/cms/mask-form.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</body>
</html>
