<?php

namespace App\Http\Controllers\Painel;
use App\Models\Setores;
use App\Http\Requests\Painel\SetoresRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SetoresController extends Controller
{
    private $setores, $totalPage = 10;
    private $request;
    
    
    public function __construct(Setores $setores, Request $request) {
        
        $this->setores = $setores;
        $this->request = $request;
    }
    
    public function index(){
        
        $title = "Gestão de Setores";
        
        $setores = $this->setores->paginate($this->totalPage);
        
        return view('Painel.Setores.index', compact('setores','title'));
    }
    
    
    public function create(){
        
        $title = 'Cadastrar Setores';
        
        return view('Painel.Setores.create-edit', compact('title'));
    }
    
    
     public function store(SetoresRequest $request){

    //Cadastrar dados no banco
        $dataSetor = $request->all();
        
       //Insere os dados do usuario...

        $insert = $this->setores->create($dataSetor);

        if ($insert)
                
        return redirect()
            
            ->route('setor.index')
            ->with(['sucess' => 'Cadastro realizado com Sucesso!']);
            
        else
                    
            return redirect()
             ->route('setor.create')
             ->withErrors(['errors' => 'Falhar ao cadastrar...'])
             ->withInput();
    }
    
    public function show($id){
        
        $setores = $this->setores->find($id);
        
        
        $title = "Exibir Setor: {$setores->setor}";
        
        return view('Painel.Setores.show', compact('setores', 'title'));
        
        
        
    }
    
    public function edit($id){
        
        $setores = $this->setores->find($id);
        
        $title = "Gestão do Setor";
        
        return view('Painel.Setores.create-edit', compact('setores','title'));
        
        
    }
    
     public function update(SetoresRequest $request, $id){
        
            //Pega todos os dados do usuário
        $dataSetor = $request->all();
        
        //Cria o objeto de usuário
        $setores = $this->setores->find($id);
        
                     
        //Altera os dados do usuário
        $update = $setores->update($dataSetor);
        
        if( $update )
            return redirect()
                        ->route('setor.index')
                        ->with(['success' => 'Alteração realizada com sucesso!']);
        else
            return redirect()->route('setor.edit', ['id' => $id])
                                        ->withErrors(['errors' => 'Falha ao editar'])
                                        ->withInput();
    }
    
    
    public function destroy($id){
        
        //Recupera o usuário
        $setores = $this->setores->find($id);
        
        //deleta
        $delete = $setores->delete();
        
        if( $delete ) {
            return redirect()->route('setor.index');
        } else {
            return redirect()->route('setor.show', ['id' => $id])
                                        ->withErrors(['errors' => 'Falha ao deletar']);
        }
        
    }
    
     public function search(Request $request)
    {
        //Recupera os dados do formulário
        $dataForm = $request->except('_token');
        
        //Filtra os usuários
        $setores = $this->setores
                    ->where('setor', 'LIKE', "%{$dataForm['key-search']}%")
                    ->orWhere('email', $dataForm['key-search'])
                    ->paginate($this->totalPage);

        return view('Painel.Setores.index', compact('setores', 'dataForm'));
    }
    
            
    
    
    
}
