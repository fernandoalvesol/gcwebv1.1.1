@extends('templates.template')

@section('content-login')

<div class="breadcrumb">
    <a href="{{url('/painel')}}" class="breadcrumb-item">Home  /</a> 
    <a href="{{url('/painel/tomador')}}" class="breadcrumb-item">Tomadores</a>
</div>


<div class="title-pg">
    <h1 class="title-pg">Gestão de Tomadores: <b>{{$tomadores->razaosocial or 'Novo'}}</b></h1>
</div>

<div class="content-din">
    @if( isset($errors) && count($errors) > 0)

    <div class="alert alert-warning">
        @foreach($errors->all() as $error)

        <p>{{$error}}</p>
        @endforeach

    </div>


    @endif


    @if(isset($tomador))
        {!! Form::model($tomador, ['route' => ['tomador.update', $tomador->id], 'class' => 'form-search form-ds', 'file' => true, 'method' => 'PUT'])!!}

    @else
        {!! Form::open(['route' => 'tomador.store', 'class' => 'form-search form-ds', 'file' => true])!!}

    @endif
    <div class="form-group col-md-12 col-xl-12">      
        <div class="form-group col-md-6 col-xl-6">
            {!! Form::text('razaosocial', null, ['placeholder' => 'Razão Social:', 'class' => 'form-control'])!!}
        </div>
        <div class="form-group col-md-6 col-xl-6">
            {!! Form::text('cnpj', null, ['placeholder' => 'CNPJ: 00.000.000/000-00', 'class' => 'form-control'])!!}
        </div>     
    </div>
    <div class="form-group col-md-12 col-xl-12">

        <div class="form-group col-md-6 col-xl-6">
            {!! Form::text('endereco', null, ['placeholder' => 'Endereço do Tomador:', 'class' => 'form-control'])!!}
        </div>
        <div class="form-group col-md-6 col-xl-6">
            {!! Form::email('email', null, ['placeholder' => 'Email do Contato:', 'class' => 'form-control'])!!}
        </div>

    </div>
    <div class="form-group col-md-12 col-xl-12">
        <div class="form-group col-md-6 col-xl-6">
            {!! Form::text('fone', null, ['placeholder' => '(00)0000.0000', 'class' => 'form-control'])!!}
        </div>
        <div class="form-group col-md-6 col-xl-6">
            {!! Form::text('contato', null, ['placeholder' => 'Contato:', 'class' => 'form-control'])!!}
        </div>

    </div>

    <div class="form-group col-md-12 col-xl-12">
        <div class="form-group col-md-12 col-xl-12">
            <button class="btn-enviar"> Enviar</button>
        </div>

    </div>

    {!! Form::close()!!}

</div><!--Content Dinâmico-->


@endsection