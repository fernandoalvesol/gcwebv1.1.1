@extends('templates.template')

@section('content-login')

<div class="breadcrumb">
    <a href="{{url('/painel')}}" class="breadcrumb-item">Home  /</a> 
    <a href="{{url('/painel/setor')}}" class="breadcrumb-item">Setores</a>
</div>


<div class="title-pg">
    <h1 class="title-pg">Gestão do Setor: <b>{{$setores->setor}}</b></h1>
</div>

<div class="content-din">
    @if( isset($errors) && count($errors) > 0)

    <div class="alert alert-warning">
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach

    </div>
    @endif

    <h2><strong>Setor: <strong> {{$setores->setor}}</h2>
    <h2><strong>Email:</strong> {{$setores->email}}</h2>
    <h2><strong>Contato:</strong> {{$setores->contato}}</h2>
    <h2><strong>Fone:</strong> {{$setores->fone}}</h2>
    
   

    {!! Form::open(['route' => ['setor.destroy', $setores->id], 'class' => 'form-search form-ds', 'method' => 'DELETE'])!!}

            <div class="form-group">
                
                {!! Form::submit("Deletar Setor: $setores->setor", ['class' => 'btn btn-danger'])!!}
                
            </div>

    {!! Form::close()!!}
    
</div><!--Content Dinâmico-->


@endsection