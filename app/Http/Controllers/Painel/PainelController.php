<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PainelController extends Controller
{
    
    
    public function index(){
        
        
      $title = 'GCWEB';
        
      return view('auth.login', compact('title'));
    }
    
    
    public function first(){
        
        
        return view('Painel.home.index');;
    }
    
    public function imprimir($id){
        
        dd($id);
        
        
    }
}
