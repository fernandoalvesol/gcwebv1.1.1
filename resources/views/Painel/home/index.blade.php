@extends('templates.template')


@section('content-login')


<div class="content-din">

    <div class="titulo-home">
        <h1 class="titulo-inicial">Painel Inicial</h1>
    </div>

    <div class="row col-xm-12 col-md-12 col-sm-12">

        <div class="col-xm-3 col-md-3 col-sm-3">
            <a href="{{url('/painel/conformidades')}}">
                <div class="rel-dash">
                    <i class="fas fa-sign-in-alt"></i>
                    <div class="text-rel">
                        
                            Receber Hoje
                       
                    </div>
                </div>
        </div>

        <div class="col-xm-3 col-md-3 col-sm-3">
            <a href="{{url('/painel/tomador')}}">
                <div class="rel-dash">
                    <i class="fas fa-sign-out-alt"></i>
                    <div class="text-rel">
                      
                            Pagar Hoje
                       
                    </div>
                </div>
        </div>

        <div class="col-xm-3 col-md-3 col-sm-3">
            <a href="{{url('/painel/setor')}}">
                <div class="rel-dash">
                    <i class="fas fa-sign-in-alt"></i>
                    <div class="text-rel">
                       
                            Recebe na Semana
                        
                    </div>
                </div>
        </div>

        <div class="col-xm-3 col-md-3 col-sm-3">
            <a href="{{url('/painel/usuarios')}}">
                <div class="rel-dash">
                   <i class="fas fa-sign-out-alt"></i>
                    <div class="text-rel">
                      
                            Pagar na Semana
                       
                    </div>
                </div>
        </div>
    </div>

</div><!--Content Dinâmico-->

@endsection