@extends('templates.template')

@section('content-login')

<div class="breadcrumb">
    <a href="{{url('/painel')}}" class="breadcrumb-item">Home  /</a> 
    <a href="{{url('/painel/tomador')}}" class="breadcrumb-item">Tomadores</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Gestão do Tomador: <b>{{$tomador->razaosocial}}</b></h1>
</div>

<div class="content-din">
    @if( isset($errors) && count($errors) > 0)

    <div class="alert alert-warning">
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach

    </div>
    @endif

    <h2><strong>Razão Social:</strong> {{$tomador->razaosocial}}</h2>
    <h2><strong>CNPJ:</strong> {{$tomador->cnpj}}</h2>
    <h2><strong>Endereço:</strong> {{$tomador->endereco}}</h2>
    <h2><strong>Email:</strong> {{$tomador->email}}</h2>
    <h2><strong>Fone:</strong> {{$tomador->fone}}</h2>
    <h2><strong>Contato:</strong> {{$tomador->contato}}</h2>
    
   

    {!! Form::open(['route' => ['tomador.destroy', $tomador->id], 'class' => 'form-search form-ds', 'method' => 'DELETE'])!!}

            <div class="form-group">
                
                {!! Form::submit("Deletar Tomador: $tomador->razaosocial", ['class' => 'btn btn-danger'])!!}
                
            </div>

    {!! Form::close()!!}
    
</div><!--Content Dinâmico-->


@endsection