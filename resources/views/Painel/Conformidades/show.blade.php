@extends('templates.template')

@section('content-login')

<div class="breadcrumb">
    <a href="{{url('/painel')}}" class="breadcrumb-item">Home  /</a> 
    <a href="{{url('/painel/conformidades')}}" class="breadcrumb-item">Conformidades</a>
</div>


<div class="title-pg">
    <h1 class="title-pg">Protocolo N.: <b>{{$conformidades->id}}</b></h1>
</div>

<div class="content-din">
    @if( isset($errors) && count($errors) > 0)

    <div class="alert alert-warning">
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach

    </div>
    @endif
  
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Descrições</th>
                <th scope="col">Resultados</th>
            </tr>

        </thead>
        <tbody>
            <tr>
                <td><strong><h4>Tipo:</h4></strong></td>
                <td><h4>{{$conformidades->tipo}}</h4></td>
            </tr>
            <tr>
                <td><strong><h4>Atribuido ao Setor:</h4></strong></td>
                <td><h4>{{$conformidades->setor}}</h4></td>
            </tr>
            <tr>
                <td><strong><h4>Tomador do Serviço:</h4></strong></td>
                <td><h4>{{$conformidades->tomador->razaosocial}}</h4></td>
            </tr>

            <tr>
                <td><strong><h4>Atribuido ao Responsável:</h4></strong></td>
                <td><h4>{{$conformidades->atribuir}}</h4></td>
            </tr>
            <tr>
                <td><strong><h4>Relator:</h4></strong></td>
                <td><h4>{{$conformidades->relator}}</h4></td>
            </tr>
            <tr>
                <td><strong><h4>Prioridade:</h4></strong></td>
                <td><h4>{{$conformidades->prioridade}}</h4></td>
            </tr>
            <tr>
                <td><strong><h4>Data da Inclusão:</h4></strong></td>
                <td><h4>{{$conformidades->data}}</h4></td>
            </tr>
            <tr>
                <td><strong><h4>Hora da Inclusão:</h4></strong></td>
                <td><h4>{{$conformidades->hora}}</h4></td>
            </tr>
            <tr>
                <td><strong><h4>Status:</h4></strong></td>
                <td><h4>{{$conformidades->status}}</h4></td>
            </tr>


        </tbody>


    </table>

    <!--lISTA DE VERIFICAÇÃO-->

    <p class="verificacao">Lista de Verificação</p>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Requisitos</th>
                <th scope="col">Verificado</th>
            </tr>

        </thead>
        <tbody>
            <tr>
                <td><strong><h4>Livro de Ocorrência:</h4></strong></td>
                <td><h4>{{$conformidades->c_um}}</h4></td>
            </tr>
            <tr>
                <td><strong><h4>Folha de Ponto:</h4></strong></td>
                <td><h4>{{$conformidades->c_dois}}</h4></td>
            </tr>
            <tr>
                <td><strong><h4>Uniforme:</h4></strong></td>
                <td><h4>{{$conformidades->c_tres}}</h4></td>
            </tr>
            <tr>
                <td><strong><h4>Validade do Crachá:</h4></strong></td>
                <td><h4>{{$conformidades->c_quatro}}</h4></td>
            </tr>
            <tr>
                <td><strong><h4>Ordens do Dia:</h4></strong></td>
                <td><h4>{{$conformidades->c_cinco}}</h4></td>
            </tr>
            <tr>
                <td><strong><h4>Reclamações?:</h4></strong></td>
                <td><h4>{{$conformidades->c_seis}}</h4></td>
            </tr>
            <tr>
                <td><strong><h4>Equipamentos do Posto:</h4></strong></td>
                <td><h4>{{$conformidades->c_sete}}</h4></td>
            </tr>
            <tr>
                <td><strong><h4>Documentação do Posto:</h4></strong></td>
                <td><h4>{{$conformidades->c_oito}}</h4></td>
            </tr>
            <tr>
                <td><strong><h4>Descrição:</h4></strong></td>
                <td><h4>{{$conformidades->descricao}}</h4></td>
            </tr>
        </tbody>


    </table>

    <div class="form-group col-md-12 col-xl-12">
             
        <div class="form-group col-md-4 col-xl-4">
            <a href="{{route('conformidades.imprimir', $conformidades->id)}}" 
               class="edit-imprimir"><span class="glyphicon glyphicon-print"></span> Imprimir Conformidade</a>    
        </div>

    </div>



</div><!--Content Dinâmico-->


@endsection