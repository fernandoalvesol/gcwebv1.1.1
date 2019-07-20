@extends('templates.template')

@section('content-login')

<div class="breadcrumb">
    <a href="{{url('/painel')}}" class="breadcrumb-item">Home /</a> 
    <a href="{{url('/painel/usuarios')}}" class="breadcrumb-item">Usuários</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Listagem dos Usuários</h1>
</div>

<div class="content-din bg-white">

    <div class="form-search">
        {!! Form::open(['route' => 'usuarios.search', 'class' => 'form form-inline']) !!}
        {!! Form::text('key-search', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
        {!! Form::submit('Filtrar', ['class' => 'btn']) !!}
        {!! Form::close() !!}
    </div>

    <div class="class-btn-insert">
        <a href="{{route('usuarios.create')}}" class="btn-insert">
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


        @forelse($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->fone}}</td>
            <td>
                <a href="{{route('usuarios.edit', $user->id)}}" class="edit"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                <a href="{{route('usuarios.show', $user->id)}}" class="delete"><span class="glyphicon glyphicon-eye-open"></span> View</a>
            </td>
        </tr>
        @empty

        <p>Nenhum Usuário Cadastrado</p>

        @endforelse

    </table>

    @if( isset($dataForm) )
    {!! $users->appends($dataForm)->links() !!}
    @else
    {!! $users->links() !!}
    @endif


</div><!--Content DinÃ¢mico-->

@endsection