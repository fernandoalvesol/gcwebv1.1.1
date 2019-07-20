@extends('templates.template')

@section('content-login')

<div class="breadcrumb">
    <a href="{{url('/painel')}}" class="breadcrumb-item">Home  ></a> 
    <a href="{{url('/painel/usuarios')}}" class="breadcrumb-item">Usuários</a>
</div>


<div class="title-pg">
    <h1 class="title-pg">Gestão do Usuário: <b>{{$user->name}}</b></h1>
</div>

<div class="content-din">
    @if( isset($errors) && count($errors) > 0)

    <div class="alert alert-warning">
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach

    </div>
    @endif

    <h2><strong>Nome:</strong> {{$user->name}}</h2>
    <h2><strong>Email:</strong> {{$user->email}}</h2>
    <h2><strong>Fone:</strong> {{$user->fone}}</h2>
    
   

    {!! Form::open(['route' => ['usuarios.destroy', $user->id], 'class' => 'form-search form-ds', 'method' => 'DELETE'])!!}

            <div class="form-group">
                
                {!! Form::submit("Deletar Usuário: $user->name", ['class' => 'btn btn-danger'])!!}
                
            </div>

    {!! Form::close()!!}
    
</div><!--Content Dinâmico-->


@endsection