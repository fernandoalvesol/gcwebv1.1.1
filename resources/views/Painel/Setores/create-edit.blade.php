@extends('templates.template')

@section('content-login')

<div class="breadcrumb">
    <a href="{{url('/painel')}}" class="breadcrumb-item">Home  /</a> 
    <a href="{{url('/painel/setor')}}" class="breadcrumb-item">Setores</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Gestão de Setores: <b>{{$setores->setor or 'Novo'}}</b></h1>
</div>

<div class="content-din">
    @if( isset($errors) && count($errors) > 0)

    <div class="alert alert-warning">
        @foreach($errors->all() as $error)

        <p>{{$error}}</p>
        @endforeach

    </div>


    @endif


    @if(isset($setores))
        {!! Form::model($setores, ['route' => ['setor.update', $setores->id], 'class' => 'form-search form-ds', 'file' => true, 'method' => 'PUT'])!!}

    @else
        {!! Form::open(['route' => 'setor.store', 'class' => 'form-search form-ds', 'file' => true])!!}

    @endif
            <div class="form-group">
                {!! Form::text('setor', null, ['placeholder' => 'Cadastre o Setor:', 'class' => 'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::email('email', null, ['placeholder' => 'E-mail:', 'class' => 'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::text('contato', null, ['placeholder' => 'Responsável do Setor:', 'class' => 'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::text('fone', null, ['placeholder' => 'Fone para Contato:', 'class' => 'form-control'])!!}
            </div>
           
            <div class="form-group">
                <button class="btn-enviar"> Enviar</button>
            </div>

    {!! Form::close()!!}

</div><!--Content Dinâmico-->


@endsection