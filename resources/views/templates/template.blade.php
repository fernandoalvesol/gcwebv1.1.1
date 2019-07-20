<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{$title or 'Gestão de Conformidades'}}</title>

        <!--Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!--Fonts-->         
        <script defer src="{{url('assets/painel/css/fontawesome-all.js')}}"></script>

        <link rel="stylesheet" href="{{url('assets/painel/css/bootstrap.min.css')}}">

        <link rel="stylesheet" href="{{url('assets/painel/css/bootstrap-datepicker.min.css')}}">

        <!--CSS Person-->
        <link rel="stylesheet" href="{{url('assets/painel/css/dask.css')}}">

        <!--CSS Person-->
        <link rel="stylesheet" href="{{url('assets/painel/css/gcweb.css')}}">

        <!--Favicon-->
        <link rel="icon" type="image/png" href="{{url('assets/painel/imgs/favicon.png')}}">
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-static-stop">
            <div class="container">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a href="{{url('/painel')}}" class="navbar-brand logotipo">
                        <img src="{{url("assets/painel/imgs/logomodo.png")}}" alt="Logo">
                    </a>
                </div>
                <div class="collapse navbar-collapse menu" id="menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrativo <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('/painel/setor')}}"><i class="fas fa-window-restore"> </i> Setores da Empresa</a></li>
                                <li><a href="{{url('/painel/tomador')}}"><i class="fas fa-users"></i> Tomadores da Empresa</a></li>
                                <li><a href="{{url('/painel/usuarios')}}"><i class="fas fa-user"></i> Usuários do Sistema</a></li>
                                <li><a href="{{url('/painel/conformidades')}}"> <i class="fas fa-clipboard-list"></i> Gestão de Conformidades</a></li>
                                <li><a href="{{url('/painel')}}"><i class="fas fa-list-alt"></i> Relatórios Gerenciais</a></li>
                                <li><a href="{{url('/painel')}}"><i class="fa fa-coffee" aria-hidden="true"></i> Gestão de Funções</a></li>
                                <li><a href="{{url('/painel')}}"><i class="fa fa-cog" aria-hidden="true"></i> Gestão de Permissões</a></li>
                                <li><a href="{{url('/painel')}}"><i class="fa fa-toggle-on" aria-hidden="true"></i> Permissões das Funções</a></li>
                                <li><a href="{{url('/painel')}}"><i class="fa fa-paperclip" aria-hidden="true"></i> Funções dos Usuários</a></li>
                            </ul>
                        </li>    
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Comercial <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('/painel/setor')}}"><i class="fas fa-cart-plus"></i> Vendas</a></li>
                                <li><a href="{{url('/painel/tomador')}}"><i class="fas fa-car"></i> Compras</a></li>
                                <li><a href="{{url('/painel/usuarios')}}"><i class="fas fa-user"></i> Clientes</a></li>
                                <li><a href="{{url('/painel/usuarios')}}"><i class="fas fa-user"></i> Fornecedores</a></li>
                                <li><a href="{{url('/painel/conformidades')}}"> <i class="fas fa-box-open"></i> Produtos</a></li>
                                <li><a href="{{url('/painel')}}"><i class="fas fa-barcode"></i> Boletos</a></li>
                                <li><a href="{{url('/painel')}}"><i class="fas fa-chart-bar"></i> Relatórios</a></li>
                            </ul>
                        </li>    
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Financeiro <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('/painel/setor')}}"><i class="fas fa-sign-in-alt"></i> Recebimentos</a></li>
                                <li><a href="{{url('/painel/tomador')}}"><i class="fas fa-sign-out-alt"></i> Pagamentos</a></li>
                                <li><a href="{{url('/painel/usuarios')}}"><i class="fas fa-file-alt"></i> Recibos</a></li>
                            </ul>
                        </li>    
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                Minha Conta
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu perfil">

                                <div class="col-sm-4 hidden-xs">

                                    <img class="img-responsive img-rounded" src="{{url('assets/painel/imgs/users.png')}}">
                                </div>
                                <ul class="list-unstyled col-sm-8">
                                    <li><a href="">{{auth()->user()->name}}</a></li>
                                    <li><a href="">Alterar Perfil</a></li>
                                    <li><a href="{{url('logout')}}">Sair</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container">

            @yield('content-login')

        </div><!--End Container-->
        
        <!-- Inicio footer-->

        <div class="clear"></div>
        <!--jQuery-->
        <script src="{{url('assets/all/js/jquery-3.1.1.min.js')}}"></script>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>

        @stack('scripts')

        <!--Bootstrap .js-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    </body>
</html>