<?php

namespace App\Http\Controllers\Painel;

use App\Models\Conformidades;
use App\Models\Tomadores;
use App\Models\Setores;
use App\Http\Requests\Painel\ConformidadesRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use App\User;
use Keygen;
use Gate;

class ConformidadesController extends Controller {

    private $conformidades, $totalPage = 10;
    private $request;

    public function __construct(Conformidades $conformidades, Request $request) {

        $this->conformidades = $conformidades;
        $this->request = $request;
    }

    public function index() {

        $title = 'Conformidades';

        $conformidades = $this->conformidades->paginate($this->totalPage);

        return view('Painel.Conformidades.index', compact('id', 'conformidades', 'title'));
    }

    public function create() {

        $title = 'Gestão de Conformidades';

        $tomador = Tomadores::get()->pluck('razaosocial', 'id');

        $setores = Setores::get()->pluck('setor', 'setor');

        $usuarios = User::get()->pluck('name', 'name');

        return view('Painel.Conformidades.create-edit', compact('title', 'tomador', 'setores', 'usuarios'));
    }

    public function store(ConformidadesRequest $request) {
//Cadastro dos dados no banco

        $dataConformidades = $request->all();

        $dataConformidades['user_id'] = auth()->user()->id;

        //$random = Keygen::numeric()->generate();
        //Insere os dados do usuario...

        $insert = $this->conformidades->create($dataConformidades);

        if ($insert)
            return redirect()
                            ->route('conformidades.index')
                            ->with(['sucess' => 'Cadastro realizado com Sucesso!']);
        else
            return redirect()
                            ->route('conformidades.create')
                            ->withErrors(['errors' => 'Falhar ao cadastrar...'])
                            ->withInput();
    }

    public function show($id) {

        $title = 'Exibir Conformidade';

        $conformidades = $this->conformidades->find($id);

        //$conformes = $this->conformidades->all();
        //$tomadores = $conformes->tomador();
        //dd($tomadores->razaosocial);


        return view('Painel.Conformidades.show', compact('title', 'conformidades'));
    }
        

    public function edit($id) {

        $title = 'Editar Conformidade';

        $conformidades = Conformidades::find($id);

        $tomador = Tomadores::get()->pluck('razaosocial', 'id');

        $setores = Setores::get()->pluck('setor', 'setor');

        $usuarios = User::get()->pluck('name', 'name');
        
        if( Gate::denies('conformidades-update', $conformidades))
            abort (403, 'Você Não Tem Permissão para Exibir Esse Conteúdo');        
              
        return view('Painel.Conformidades.create-edit', compact('title', 'conformidades', 'tomador', 'setores', 'usuarios'));
    }

    public function update(ConformidadesRequest $request, $id) {

                //Pega todos os dados do usuário
        $dataConformidades = $request->all();

        //Cria o objeto de usuário
        $conformidades = $this->conformidades->find($id);


        //Altera os dados do usuário
        $update = $conformidades->update($dataConformidades);

        if ($update)
            return redirect()
                            ->route('conformidades.index')
                            ->with(['success' => 'Alteração realizada com sucesso!']);
        else
            return redirect()->route('conformidades.edit', ['id' => $id])
                            ->withErrors(['errors' => 'Falha ao editar'])
                            ->withInput();
    }

    public function destroy($id) {

        //Recupera o usuário
        $conformidades = $this->conformidades->find($id);

        //deleta
        $delete = $conformidades->delete();

        if ($delete) {
            return redirect()->route('conformidades.index');
        } else {
            return redirect()->route('conformidades.show', ['id' => $id])
                            ->withErrors(['errors' => 'Falha ao deletar']);
        }
    }

    public function search(Request $request) {
        //Recupera os dados do formulário
        $dataForm = $request->except('_token');

        //Filtra os usuários
        $conformidades = $this->conformidades
                ->where('id', 'LIKE', "%{$dataForm['key-search']}%")
                ->orWhere('tipo', $dataForm['key-search'])
                ->paginate($this->totalPage);

        return view('Painel.Conformidades.index', compact('conformidades', 'dataForm'));
    }

    public function imprimir($id) {
        
        
        $title = 'Relatorio de Checklist';

        $conforme = $this->conformidades->find($id);

        $pdf = PDF::loadView('Painel.Conformidades.imprimir', ['conforme' => $conforme]);
        return $pdf->download('conformidades.pdf');


    }

}
