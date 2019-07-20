<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\Painel\UserRequest;
use App\Http\Controllers\Controller;


class UserController extends Controller
{

    private $user, $totalPage = 10;
    private $request;


    public function __construct(User $user, Request $request) 
    {
        $this->user = $user;
        $this->request = $request;
    }
        
    public function index()
    {

        $title = 'Gestão de Usuários';
        
        $users = $this->user->paginate($this->totalPage);
         
        return view('Painel.Usuarios.index', compact('users','title'));

    }
    
    public function create(){
        
        $title = 'Cadastrar Usuários';
        
        return view('Painel.Usuarios.create-edit', compact('title'));
                
        
    }
    
    public function store(UserRequest $request)
    {

    //Cadastrar dados no banco
        $dataUser = $request->all();
        
        //Criptografa a senha
        $dataUser['password'] = bcrypt($dataUser['password']);


        //Insere os dados do usuario...

        $insert = $this->user->create($dataUser);

        if ($insert)
                
        return redirect()
            
            ->route('usuarios.index')
            ->with(['sucess' => 'Cadastro realizado com Sucesso!']);
            
        else
                    
            return redirect()
             ->route('usuarios.create')
             ->withErrors(['errors' => 'Falhar ao cadastrar...'])
             ->withInput();
}

    public function show($id){
      
        
        $user = $this->user->find($id);
        
        $title = "Exibir: {$user->name}";
    
    
        return view('Painel.Usuarios.show', compact('user','title'));
}

    public function edit($id){
        
        $user = $this->user->find($id);
        
        $title = "Nome do Usuários': {$user->name}";
        
        return view('Painel.Usuarios.create-edit', compact('user', 'title'));        
        
    }
    
    public function update(UserRequest $request, $id){
        
            //Pega todos os dados do usuário
        $dataUser = $request->all();
        
        //Cria o objeto de usuário
        $user = $this->user->find($id);
        
        //Criptografa a senha
        if( isset($dataUser['password']) && $dataUser['password'] != '' )
            $dataUser['password'] = bcrypt($dataUser['password']);
        
               
        //Altera os dados do usuário
        $update = $user->update($dataUser);
        
        if( $update )
            return redirect()
                        ->route('usuarios.index')
                        ->with(['success' => 'Alteração realizada com sucesso!']);
        else
            return redirect()->route('usuarios.edit', ['id' => $id])
                                        ->withErrors(['errors' => 'Falha ao editar'])
                                        ->withInput();
    }
    
     public function destroy($id)
    {
        //Recupera o usuário
        $user = $this->user->find($id);
        
        //deleta
        $delete = $user->delete();
        
        if( $delete ) {
            return redirect()->route('usuarios.index');
        } else {
            return redirect()->route('usuarios.show', ['id' => $id])
                                        ->withErrors(['errors' => 'Falha ao deletar']);
        }
    }
    
        
    public function search(Request $request)
    {
        //Recupera os dados do formulário
        $dataForm = $request->except('_token');
        
        //Filtra os usuários
        $users = $this->user
                    ->where('name', 'LIKE', "%{$dataForm['key-search']}%")
                    ->orWhere('email', $dataForm['key-search'])
                    ->paginate($this->totalPage);

        return view('Painel.Usuarios.index', compact('users', 'dataForm'));
    }
    
    
    }

