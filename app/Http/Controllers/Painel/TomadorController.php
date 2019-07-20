<?php

namespace App\Http\Controllers\Painel;
use Illuminate\Http\Request;
use App\Models\Tomadores;
use App\Http\Requests\Painel\TomadorRequest;
use App\Http\Controllers\Controller;

class TomadorController extends Controller
{
    private $tomador, $request;
    protected $totalPage;
    
    
    public function __construct(Tomadores $tomador, Request $request) {
        
        $this->tomador = $tomador;
        $this->request = $request;     
        
      
    }

    public function index(){
        
        $title = 'Gestão de Tomadores';
        
        $tomadores = $this->tomador->paginate($this->totalPage);
        
        
        return view('Painel.Tomadores.index', compact('tomadores','title'));
                
        
    }
    
    public function create(){
            
            $title = 'Cadastrar Tomador';
            
            return view('Painel.Tomadores.create-edit', compact('title'));
        }
        
        
    public function store(TomadorRequest $request){

    //Cadastrar dados no banco
        $dataTomador = $request->all();
        
       //Insere os dados do usuario...

        $insert = $this->tomador->create($dataTomador);

        if ($insert)
                
        return redirect()
            
            ->route('tomador.index')
            ->with(['sucess' => 'Cadastro realizado com Sucesso!']);
            
        else
                    
            return redirect()
             ->route('tomador.create')
             ->withErrors(['errors' => 'Falhar ao cadastrar...'])
             ->withInput();
}

    public function show($id){
        
        $tomador = $this->tomador->find($id);
        
        $title = "Exibir: {$tomador->razaosocial}";
        
        return view('Painel.Tomadores.show', compact('tomador','title'));
        
    }
    
    public function edit($id){
        
        $tomador = $this->tomador->find($id);
        
        $title = "Exibir: {$tomador->razaosocial}";
        
        return view('Painel.Tomadores.create-edit', compact('tomador', 'title'));
        
        
    }
    
    public function update(TomadorRequest $request, $id){
        
            //Pega todos os dados do usuário
        $dataTomador = $request->all();
        
        //Cria o objeto de usuário
        $tomador = $this->tomador->find($id);
        
                     
        //Altera os dados do usuário
        $update = $tomador->update($dataTomador);
        
        if( $update )
            return redirect()
                        ->route('tomador.index')
                        ->with(['success' => 'Alteração realizada com sucesso!']);
        else
            return redirect()->route('tomador.edit', ['id' => $id])
                                        ->withErrors(['errors' => 'Falha ao editar'])
                                        ->withInput();
    }
    
    public function destroy($id){
        
        //Recupera o usuário
        $tomador = $this->tomador->find($id);
        
        //deleta
        $delete = $tomador->delete();
        
        if( $delete ) {
            return redirect()->route('tomador.index');
        } else {
            return redirect()->route('tomador.show', ['id' => $id])
                                        ->withErrors(['errors' => 'Falha ao deletar']);
        }
    }
    
    
    public function search(Request $request)
    {
        //Recupera os dados do formulário
        $dataForm = $request->except('_token');
        
        //Filtra os usuários
        $tomadores = $this->tomador
                    ->where('razaosocial', 'LIKE', "%{$dataForm['key-search']}%")
                    ->orWhere('email', $dataForm['key-search'])
                    ->paginate($this->totalPage);

        return view('Painel.Tomadores.index', compact('tomadores', 'dataForm'));
    }
    
}
