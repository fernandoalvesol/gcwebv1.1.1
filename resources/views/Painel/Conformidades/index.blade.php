@extends('templates.template')

@section('content-login')

<div class="breadcrumb">
    <a href="{{url('/painel')}}" class="breadcrumb-item">Home  /</a> 
    <a href="{{url('/painel/conformidades')}}" class="breadcrumb-item">Conformidades</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Listagem das Não Conformidades</h1>
</div>

<div class="content-din bg-white">

    <div class="form-search">
        {!! Form::open(['route' => 'conformidades.search', 'class' => 'form form-inline']) !!}
        {!! Form::text('key-search', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
        {!! Form::submit('Filtrar', ['class' => 'btn']) !!}
        {!! Form::close() !!}
    </div>

    <div class="class-btn-insert">
        <a href="{{route('conformidades.create')}}" class="btn-insert">
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
            <th>Protocolo</th>
            <th>Tipo</th>
            <th>Setor</th>
            <th>Atribuir a:</th>
            <th>Data</th>
            <th>Hora</th>
            <th>Status</th>
            <th width="280">Ações</th>
        </tr>


        @forelse($conformidades as $conforme)
        <tr>
            <td>{{$conforme->id}}</td>
            <td>{{$conforme->tipo}}</td>
            <td>{{$conforme->setor}}</td>
            <td>{{$conforme->atribuir}}</td>
            <td>{{$conforme->data}}</td>
            <td>{{$conforme->hora}}</td>
            <td>{{$conforme->status}}</td>
            <td>

                    <a href="{{route('conformidades.show', $conforme->id)}}" class="edit"><span class="glyphicon glyphicon-eye-open"></span> Show</a>

                @can('conformidades-update', $conforme )
                    <a href="{{route('conformidades.edit', $conforme->id)}}" class="delete"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                    <a href="{{route('conformidades.destroy', $conforme->id)}}" class="destroy"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                @endcan    
            </td>


        </tr>
        @empty

        <p>Nenhum Usuário Cadastrado</p>

        @endforelse

    </table>

    @if( isset($dataForm) )
    {!! $conformidades->appends($dataForm)->links() !!}
    @else
    {!! $conformidades->links() !!}
    @endif

</div><!--Content DinÃ¢mico-->

@endsection