@extends('templates.template')

@section('content-login')

<div class="breadcrumb">
    <a href="{{url('/painel')}}" class="breadcrumb-item">Home  /</a> 
    <a href="{{url('/painel/conformidades')}}" class="breadcrumb-item">Conformidades</a>
</div>


<div class="title-pg">
    <h1 class="title-pg">Protocolo N.:  <b>{{$conformidades->id or 'Novo'}}</b></h1>
</div>

<div class="content-din">
    @if( isset($errors) && count($errors) > 0)

    <div class="alert alert-warning">
        @foreach($errors->all() as $error)

        <p>{{$error}}</p>
        @endforeach

    </div>

    @endif


    @if(isset($conformidades))
    {!! Form::model($conformidades, ['route' => ['conformidades.update', $conformidades->id], 'class' => 'form-search form-ds', 'file' => true, 'method' => 'PUT'])!!}

    @else
    {!! Form::open(['route' => 'conformidades.store', 'class' => 'form-search form-ds', 'file' => true])!!}

    @endif
    <div class="form-group col-md-12 col-xl-12">
        <div class="form-group col-md-3 col-xl-3">
            Qual a Prioridade?:
            {!! Form::select('prioridade', ['Selecione a Prioridade:','Baixa' => 'Baixa', 'Normal' => 'Normal', 'Alta' => 'Alta', 'Urgente' => 'Urgente'], null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-3 col-xl-3">
            Qual o Tipo?:
            {!! Form::select('tipo', ['Escolha o Tipo','Solicitação' => 'Solicitação', 'Informação' => 'Informação', 'Ocorrências' => 'Ocorrências'], null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-3 col-xl-3">
            Quem é o Tomador de Serviço?
            {!! Form::select('tomador_id', $tomador, null, ['placeholder' => 'Tomador de Serviço:', 'class' => 'form-control'])!!}
        </div>
        <div class="form-group col-md-3 col-xl-3">
            Qual o Setor Responsável?
            {!! Form::select('setor', $setores, null, ['placeholder' => 'Setor da Empresas:', 'class' => 'form-control'])!!}
        </div>
    </div>
    <div class="form-group col-md-12 col-xl-12">
        <div class="form-group col-md-2 col-xl-2">
            Relator:
            {!! Form::select('relator', $usuarios, null, ['placeholder' => 'Relator:', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2 col-xl-2">
            Atribuir a:
            {!! Form::select('atribuir', $usuarios, null, ['placeholder' => 'Atribuir a:', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-3 col-xl-3">
            Selecione a Data:
            {!! Form::date('data', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2 col-xl-2">
            Selecione a Hora:
            {!! Form::time('hora', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-3 col-xl-3">
            Selecione o Status:
            {!! Form::select('status', ['S' => 'Escolha o Status', 'E' => 'Enviado' , 'R' => 'Resolvido', 'A' => 'Aguardar', 'D' => 'Em Andamento' ], null, ['class' => 'form-control']) !!}
        </div>

    </div>
    
    <div class="form-group col-md-12 col-xl-12">
        <div class="form-group col-md-6 col-xl-6">
             <label>Lista de Verificação</label>
        </div>       
    </div>
    <div class="form-group col-md-12 col-xl-12">        
        <div class="form-group col-md-6 col-xl-6">            
            <label>Livro:</label>
            {!! Form::radio('c_um', 'Em Conformidade') !!}Em conformidade
            {!! Form::radio('c_um', 'Não Conformidade') !!}Não conformidade
            {!! Form::radio('c_um', 'Observação') !!}Observação
        </div>
         <div class="form-group col-md-6 col-xl-6">            
            <label>Folha de Ponto:</label>
            {!! Form::radio('c_dois', 'Em Conformidade') !!}Em conformidade
            {!! Form::radio('c_dois', 'Não Conformidade') !!}Não conformidade
            {!! Form::radio('c_dois', 'Observação') !!}Observação
        </div>
    </div>
    <div class="form-group col-md-12 col-xl-12">        
        <div class="form-group col-md-6 col-xl-6">            
            <label>Fardamento:</label>
            {!! Form::radio('c_tres', 'Em Conformidade') !!}Em conformidade
            {!! Form::radio('c_tres', 'Não Conformidade') !!}Não conformidade
            {!! Form::radio('c_tres', 'Observação') !!}Observação
        </div>
         <div class="form-group col-md-6 col-xl-6">            
            <label>Validade Crachá:</label>
            {!! Form::radio('c_quatro', 'Em Conformidade') !!}Em conformidade
            {!! Form::radio('c_quatro', 'Não Conformidade') !!}Não conformidade
            {!! Form::radio('c_quatro', 'Observação') !!}Observação
        </div>
    </div>
      <div class="form-group col-md-12 col-xl-12">        
        <div class="form-group col-md-6 col-xl-6">            
            <label>Ordens do dia:</label>
            {!! Form::radio('c_cinco', 'Em Conformidade') !!}Em conformidade
            {!! Form::radio('c_cinco', 'Não Conformidade') !!}Não conformidade
            {!! Form::radio('c_cinco', 'Observação') !!}Observação
        </div>
         <div class="form-group col-md-6 col-xl-6">            
            <label>Reclamações?:</label>
            {!! Form::radio('c_seis', 'Em Conformidade') !!}Em conformidade
            {!! Form::radio('c_seis', 'Não Conformidade') !!}Não conformidade
            {!! Form::radio('c_seis', 'Observação') !!}Observação
        </div>
    </div>
      <div class="form-group col-md-12 col-xl-12">        
        <div class="form-group col-md-6 col-xl-6">            
            <label>Equipamentos?:</label>
            {!! Form::radio('c_sete', 'Em Conformidade') !!}Em conformidade
            {!! Form::radio('c_sete', 'Não Conformidade') !!}Não conformidade
            {!! Form::radio('c_sete', 'Observação') !!}Observação
        </div>
         <div class="form-group col-md-6 col-xl-6">            
            <label>Documentação?:</label>
            {!! Form::radio('c_oito', 'Em Conformidade') !!}Em conformidade
            {!! Form::radio('c_oito', 'Não Conformidade') !!}Não conformidade
            {!! Form::radio('c_oito', 'Observação') !!}Observação
        </div>
    </div>

    <div class="form-group col-md-12 col-xl-12">
        <div class="form-group col-md-12 col-xl-12">
            {!! Form::textarea('descricao', null, ['placeholder' => 'Descrição:', 'class' => 'form-control']) !!}
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