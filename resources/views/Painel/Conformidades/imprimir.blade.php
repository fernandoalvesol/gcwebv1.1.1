<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Conformidades</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{url('assets/painel/css/pdf.css')}}"/>
    </head>
    <body>
        <h1>ProterService Terceirização e Serviços</h1>
        <h3>Folha de Verificação de Conformidades - GCWEB</h3>

        <h1> Conformidade Protocolo N.: {{$conforme->id}}</h1>

        <div class="container">
            
            <h1>1 Dados da Conformidade</h1>

            <ul class="list-group estilo-lista">
                <li class="list-group-item"><b>Tipo:</b> {{$conforme->tipo}}</li>
                <li class="list-group-item"><b>Atribuido ao Setor: </b>{{$conforme->setor}}</li>
                <li class="list-group-item"><b>Atribuido ao Responsável: </b>{{$conforme->atribuir}}</li>
                <li class="list-group-item"><b>Tomador de Serviço: </b>{{$conforme->tomador->razaosocial}}</li>
                <li class="list-group-item"><b>Relator: </b>{{$conforme->relator}}</li>
                <li class="list-group-item"><b>Prioridade: </b>{{$conforme->prioridade}}</li>
                <li class="list-group-item"><b>Data de Inclusão: </b>{{$conforme->data}}</li>
                <li class="list-group-item"><b>Hora da Inclusão: </b>{{$conforme->hora}}</li>
                <li class="list-group-item"><b>Status: </b>{{$conforme->status}}</li>
            </ul>

            <h1>2 Lista de Verificação do Posto</h1>


            <ul class="list-group estilo-lista">
                <li class="list-group-item"><b>Livro de Ocorrência:</b> {{$conforme->c_um}}</li>
                <li class="list-group-item"><b>Folha de Ponto: </b>{{$conforme->c_dois}}</li>
                <li class="list-group-item"><b>Uniforme: </b>{{$conforme->c_tres}}</li>
                <li class="list-group-item"><b>Validade do Crachá: </b>{{$conforme->c_quatro}}</li>
                <li class="list-group-item"><b>Ordens do Dia: </b>{{$conforme->c_cinco}}</li>
                <li class="list-group-item"><b>Reclamações: </b>{{$conforme->c_seis}}</li>
                <li class="list-group-item"><b>Equipamentos do Posto: </b>{{$conforme->c_sete}}</li>
                <li class="list-group-item"><b>Anotações: </b>{{$conforme->c_oito}}</li>
            </ul>
            
            
            <h1>3 Anotações Extras</h1>
            
            <p>Anotações: </p>
            <br>
            
            {{$conforme->descricao}}


        </div>
        
        <div class="final">
            
            <p>Esta Conformidade foi Relatada por: {{$conforme->relator}}</p>
            
            
        </div>
    </body>

</html>
