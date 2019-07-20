<!DOCTYPE html>
<html>
    <head>
        <title>Acessar</title>

        <!--CSS Person-->
        <link rel="stylesheet" href="{{url('assets/painel/css/login-gcweb.css')}}">

        <!--Favicon-->
        <link rel="icon" type="image/png" href="{{url('assets/painel/imgs/favicon.png')}}">
    </head>
    <body class="bg-login">

        <section class="login">

            <div class="image-login">
                <img src="{{url('assets/painel/imgs/logologin.png')}}" alt="Gestor de Conformidades Web" class="logo-painel">
            </div>
            <div class="entrada">
                <p>Entre com seu Email e Senha</p>

            </div>

            @if( isset($errors) && count($errors) > 0)

            <div class="alert alert-warning">
                @foreach($errors->all() as $error)

                <p>{{$error}}</p>
                @endforeach

            </div>

            @endif


            @yield('content-login')

        </section>
        <!-- jS Bootstrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    </body>
</html>