@extends('templates.template')

@section('content-login')

<div class="breadcrumb">
    <a href="{{url('/painel')}}" class="breadcrumb-item">Home  /</a> 
    <a href="{{url('/painel/setor')}}" class="breadcrumb-item">Setores</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Listagem dos Setores</h1>
</div>

<div class="content-din bg-white">

    <div class="form-search">
        {!! Form::open(['route' => 'setor.search', 'class' => 'form form-inline']) !!}
        {!! Form::text('key-search', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
        {!! Form::submit('Filtrar', ['class' => 'btn']) !!}
        {!! Form::close() !!}
    </div>

    <div class="class-btn-insert">
        <a href="{{route('setor.create')}}" class="btn-insert">
            <span class="glyphicon glyphicon-plus"></span>
            Cadastrar
        </a>
    </div>

    @if( Session::has('success') )
    <div class="alert alert-success hide-msg" style="float: left; width: 100%; margin: 10px 0px;">
        {{Session::get('success')}}
    </div>
    @endif

    <table class="table table-striped">
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Fone</th>
            <th width="180">Ações</th>
        </tr>


        @forelse($setores as $setor)
        <tr>
            <td>{{$setor->setor}}</td>
            <td>{{$setor->email}}</td>
            <td>{{$setor->contato}}</td>
            <td>{{$setor->fone}}</td>
            <td>
                <a href="{{route('setor.edit', $setor->id)}}" class="edit"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                <a href="{{route('setor.show', $setor->id)}}" class="delete"><span class="glyphicon glyphicon-eye-open"></span> View</a>
            </td>
        </tr>
        @empty

        <p>Nenhum Usuário Cadastrado</p>

        @endforelse

    </table>
    
     @if( isset($dataForm) )
        {!! $setores->appends($dataForm)->links() !!}
    @else
        {!! $setores->links() !!}
    @endif

   
</div><!--Content DinÃ¢mico-->

@endsection